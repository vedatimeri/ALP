<?php 
include "db_conn.php";
// $response = array();
// header('Access-Control-Allow-Origin: *');
if(isset($_POST['submit']))
{
$id = $_POST['id'];
$title = $_POST['title'];
$category = $_POST['category'];
$price = $_POST['price'];
$img = $_POST['img'];
$description = $_POST['description'];

$sql = "INSERT INTO products (id, title, category, price, img, description)   VALUES ('$id','$title', '$category', '$price', '$img', '$description')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header('location:home.php');  
  }
  else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
 mysqli_close($conn);

//    echo $product . ' ' . $payment . ' ' . $table . ' ' . $total;



}

?>