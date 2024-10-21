<?php

namespace Model;

use PDOException;

require_once "./Model.php";


class Product extends Model {

  function __construct(){
    parent::__construct();

    $this->table = "products";
    $this->create_table();
  }


  public function create_table(){
    $query = <<<QUERY
      CREATE TABLE IF NOT EXISTS $this->table (
        id INT AUTO_INCREMENT PRIMARY KEY,
        category_id INTEGER REFERENCES categories(id),
        FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        price DOUBLE PRECISION NOT NULL,
        stock_quantity INTEGER NOT NULL,
        avg_review DOUBLE PRECISION DEFAULT 0,
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