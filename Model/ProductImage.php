<?php

namespace Model;

use PDOException;

require_once "./Model.php";


class ProductImage extends Model {

  function __construct(){
    parent::__construct();
    $this->table = "product_images";

    $this->create_table();
  }


  public function create_table(){
    $query = <<<QUERY
      CREATE TABLE IF NOT EXISTS $this->table (
        id INT AUTO_INCREMENT PRIMARY KEY,
        products_id INTEGER REFERENCES products(id),
        FOREIGN KEY (products_id) REFERENCES products(id) ON DELETE CASCADE,
        name VARCHAR(255),
        path TEXT,
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