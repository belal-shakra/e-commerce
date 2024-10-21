<?php

namespace Model;

use PDOException;

require_once "./Model.php";


class Wishlist extends Model {

  function __construct(){
    parent::__construct();
    $this->table = "wishlists";

    $this->create_table();
  }


  public function create_table(){
    $query = <<<QUERY
      CREATE TABLE IF NOT EXISTS $this->table (
          id INT AUTO_INCREMENT PRIMARY KEY,
          user_id INTEGER REFERENCES users(id),
          product_id INTEGER REFERENCES products(id),
          FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
          FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
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