<?php

namespace Model;

use PDOException;

require_once "./Model.php";


class Coupon extends Model {

  function __construct(){
    parent::__construct();
    $this->table = "coupons";

    $this->create_table();
  }


  public function create_table(){
    $query = <<<QUERY
      CREATE TABLE IF NOT EXISTS $this->table (
          id INT AUTO_INCREMENT PRIMARY KEY,
          admin_id INTEGER NOT NULL,
          FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE CASCADE,
          code VARCHAR(255) UNIQUE NOT NULL,
          is_valid BOOLEAN DEFAULT TRUE,
          discount_percentage DECIMAL(5, 2),
          valid_from TIMESTAMP,
          valid_until TIMESTAMP,
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