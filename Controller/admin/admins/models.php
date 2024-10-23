<?php

class Model {

  private const DATABASE = "ecommerce";
  private const SERVERNAME = "localhost";
  private const USERNAME = "root";
  private const PASSWORD = "";
  protected $conn;

  protected $table;
  protected $pk = "id";



  function __construct(){
    $this->create_database(self::DATABASE);
    $this->open(self::SERVERNAME, self::USERNAME, self::PASSWORD);
  }

  function __destruct(){
    $this->conn = null;
  }



  private function open($servername, $username, $password){

    try {
      $this->conn = new PDO("mysql:host=$servername;dbname=".self::DATABASE, $username, $password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $error) {
      echo "Connection failed: " . $error->getMessage();
    }
  }

  private function create_database($database){

    try {
      $conn = new PDO("mysql:host=".self::SERVERNAME, self::USERNAME, self::PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql_query = "CREATE DATABASE IF NOT EXISTS ". self::DATABASE;
      $conn->exec($sql_query);

    
    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }

  private function create_table(){}



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

    }catch(PDOException $error){
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


class Admin extends Model {

  function __construct(){
    parent::__construct();
    $this->table = "admins";

    $this->create_table();
  }


  public function create_table(){
    $query = <<<QUERY
      CREATE TABLE IF NOT EXISTS $this->table (
          id INT AUTO_INCREMENT PRIMARY KEY,
          username VARCHAR(50) NOT NULL UNIQUE,
          first_name VARCHAR(50) NOT NULL,
          last_name VARCHAR(50) NOT NULL,
          email VARCHAR(100) NOT NULL UNIQUE,
          role ENUM('admin', 'super admin') NOT NULL DEFAULT 'super admin',
          password VARCHAR(255) NOT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )
    QUERY;

    try {
      $this->conn->exec($query);
    
    }catch(PDOException $error){
      echo $error->getMessage()."<br>";
    }
  }


  public function insert($data){
    var_dump($data);
    $this->create($data);

  }

}
