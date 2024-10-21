<?php

namespace Model;

use PDOException;

require_once "./Model.php";


class Address extends Model {

  function __construct(){
    parent::__construct();
    $this->table = "addresses";

    $this->create_table();
  }


  public function create_table(){
    $query = <<<QUERY
      CREATE TABLE IF NOT EXISTS $this->table (
        id SERIAL PRIMARY KEY,
        user_id INTEGER REFERENCES users(id),
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        city VARCHAR(255),
        address VARCHAR(255),
        is_default BOOLEAN,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      )
    QUERY;

    try {
      $this->conn->exec($query);
    
    }catch(PDOException $error){
      echo $error->getMessage()."<br>";
    }
  }


  public function insert($data){
    $this->create($data);
  }

}