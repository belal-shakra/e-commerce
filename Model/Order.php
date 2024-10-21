<?php

namespace Model;

use PDOException;

require_once "./Model.php";


class Order extends Model {

  function __construct(){
    parent::__construct();
    $this->table = "orders";

    $this->create_table();
  }


  public function create_table(){
    $query = <<<QUERY
      CREATE TABLE IF NOT EXISTS $this->table (
          id INT AUTO_INCREMENT PRIMARY KEY,
          user_id INTEGER,
          coupon_id INTEGER,
          FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
          FOREIGN KEY (coupon_id) REFERENCES coupons(id) ON DELETE SET NULL,
          status VARCHAR(255) NOT NULL,
          original_price DECIMAL(10, 2),
          total_amount DECIMAL(10, 2),
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