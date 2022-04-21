<?php 

session_start(); 
include "db_conn.php";
// $response = array();
header('Access-Control-Allow-Origin: *');
$product_id = $_POST['product_id'];
$card_id = $_POST['cart_id'];
$product_count = $_POST['product_count'];


$sql = "INSERT INTO card_products (product_id, card_id, product_count)   VALUES ('$product_id', '$card_id', '$product_count')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  }

//    echo $product . ' ' . $payment . ' ' . $table . ' ' . $total;





?>