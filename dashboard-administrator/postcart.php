<?php 

session_start(); 
include "db_conn.php";
// $response = array();
header('Access-Control-Allow-Origin: *');
$product = $_POST['product'];
$payment = $_POST['payment'];
$tavolina = $_POST['tavolina'];
$total = $_POST['total'];

$sql = "INSERT INTO card (product, payment, tavolina, total)   VALUES ('$product', '$payment', '$tavolina', '$total')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  }

//    echo $product . ' ' . $payment . ' ' . $table . ' ' . $total;





?>