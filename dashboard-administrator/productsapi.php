<?php 

session_start(); 
include "db_conn.php";
$response = array();

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
// $result = $conn->query($sql); 

if($result){
    header("Content-Type: JSON");
    header('Access-Control-Allow-Origin: *');
    $i=0;
    while($row = mysqli_fetch_assoc($result)){
        $response[$i]['id'] = $row['id'];
        $response[$i]['title'] = $row['title'];
        $response[$i]['category'] = $row['category'];
        $response[$i]['price'] = $row['price'];
        $response[$i]['img'] = $row['img'];
        $response[$i]['desc'] = $row['description'];
        $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}   

?>