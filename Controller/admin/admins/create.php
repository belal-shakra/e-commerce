<?php


session_start();
// $_POST Data


require_once "./models.php";




class AddNewAdmin {

  /**
   * Create new record in admins table.
   * @param data : the data comes through the adding form.
   */
  public function create($data){
    //
  }

  /**
   * Check if the data are valid or not.
   * is empty
   * use clean()
   * check if email
   * check if passwords are same.
   * @param data : the data sent to check if valid.
   * @return true if all data are valid, flase otherwise.
   */
  public function validation($data){

    $result = true;

    if(!$data["first_name"]){
      $result = false;
      $_SESSION["add_admin_errors"]["first_name_error"] = "The first name field is required.";
    }

    if(!$data["last_name"]){
      $result = false;
      $_SESSION["add_admin_errors"]["last_name_error"] = "The last name field is required.";
    }

    if(!$data["email"]){
      $result = false;
      $_SESSION["add_admin_errors"]["email_error"] = "The email field is required.";
    }

    if(!$data["username"]){
      $result = false;
      $_SESSION["add_admin_errors"]["username_error"] = "The username field is required.";
    }

    if(!$data["password"] || !$data["password_confirmation"]){
      $result = false;
      $_SESSION["add_admin_errors"]["password_error"] = "The password field is required.";
    }
    else if ($data["password"] != $data["password_confirmation"]){
      $result = false;
      $_SESSION["add_admin_errors"]["password_error"] = "The passwords aren't same.";
    }



    return $result;
  }

  /**
   * Check if the entered email is sexits;
   */
  public function check_if_exists($email){}
}




if($_SERVER["REQUEST_METHOD"] == "POST"){

  $newAdmin = new AddNewAdmin();
  $admin = new Admin();

  if ($newAdmin->validation($_POST)) {
    unset($_POST["password_confirmation"]);
    $_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $admin->insert($_POST);
  }

}

?>
