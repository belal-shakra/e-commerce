<?php

namespace Model;

use PDOException;

require_once "./Model.php";


class Message extends Model {

  function __construct(){
    parent::__construct();
    $this->table = "messages";

    $this->create_table();
  }


  public function create_table(){
    $query = <<<QUERY
      CREATE TABLE IF NOT EXISTS $this->table (
          id INT AUTO_INCREMENT PRIMARY KEY,
          admin_id INTEGER NOT NULL,
          FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE CASCADE,
          status BOOLEAN DEFAULT FALSE,
          name VARCHAR(255),
          email VARCHAR(255),
          message TEXT,
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

