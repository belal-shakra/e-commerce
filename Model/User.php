<?php

class Model {

  private const DATABASE = "e-commerce";
  private const SERVERNAME = "localhost";
  private const USERNAME = "belal_shakra";
  private const PASSWORD = "Qwer?123";
  private $conn;

  protected $table;
  protected $pk = "id";



  function __construct(){
    $this->open(self::SERVERNAME, self::USERNAME, self::PASSWORD);
    // $this->create_database(self::DATABASE);
  }

  function __destruct(){
    $this->conn = null;
  }



  private function open($servername, $username, $password){

    try {
      // echo "mysql:host=$servername;dbname=".self::DATABASE."<br>";
      $this->conn = new PDO("mysql:host=$servername;dbname=".self::DATABASE, $username, $password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(Exception $error) {
      echo "Connection failed: " . $error->getMessage();
    }
  }

  private function create_database($database){

    try {
    
      $sql_query = "CREATE DATABASE $database";
      $this->conn->exec($sql_query);

    
    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }

  private function create_table($query){

    try {
      $this->conn->exec($query);

    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }



  public function create(array $data){
    $query = "INSERT INTO $this->table";
    $columns = "(";
    $values = "VALUES (";

    foreach ($data as $key => $value) {
      $columns .= "$key";
      ($value != end($data))? $columns .= ", ": $columns .= ")";
      
      $values .= "'$value'";
      ($value != end($data))? $values .= ", ": $values .= ")";
    }
    $query .= " $columns $values";

    try {
      $this->conn->exec($query);

    }catch(Exception $error){
      echo $error->getMessage();
    }
  }


  public function select($pk, $operator,  ...$data){
    $query = "SELECT ";

    foreach ($data as $value) {
      $query .= "$value";
      ($value != end($data))? $query .= ", ": $query .= " ";
    }
    $query .= "FROM $this->table WHERE $this->pk $operator $pk";


    echo $query."<br>";
    try {
      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      return $stmt->fetch();
    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }

  public function where($query){

    try {
      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll();
    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }

  public function find($pk){
    try {
      $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE $this->pk=$pk");
      $stmt->execute();

      return $stmt->fetch();
    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }


  public function update(array $data, $pk){
    $query = "UPDATE $this->table SET ";

    foreach ($data as $key => $value) {
      $query .= "$key='$value'";
      ($value != end($data))? $query .= ", ": $query .= " ";
      
    }
    $query .= "WHERE $this->pk=$pk";

    return $query;

    try {
      $stmt = $this->conn->prepare($query);
      $stmt->execute();

    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }


  public function delete($pk){
    try {
      $this->conn->exec("DELETE FROM $this->table WHERE $this->pk=$pk");

    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }

}




class User extends Model {



  function __construct(){
    parent::__construct();

    $this->table = "users";
  }

  public function insert($data){
    $this->create($data);
  }




}

$data = [
  "first_name" => "Beloo",
  "last_name" => "Shakra",
  "email" => "beloo@shakra.com"
];

$user = new User();
// $data = $user->where("SELECT * FROM users");
$data = $user->create($data);
$data = $user->find(2);


echo "<pre>";
var_dump($data["first_name"]);
echo "</pre>";

// echo $data["first_name"]."<br>";
