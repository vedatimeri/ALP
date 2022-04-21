<?php 

session_start(); 
include "db_conn.php";
$response = array();

$sql = "SELECT * FROM card";
$result = mysqli_query($conn, $sql);
// $result = $conn->query($sql); 

if($result){
    header("Content-Type: JSON");
    header('Access-Control-Allow-Origin: *');
    $i=0;
    while($row = mysqli_fetch_assoc($result)){
        $response[$i]['id'] = $row['id'];
        $response[$i]['product'] = $row['product'];
        $response[$i]['total'] = $row['total'];
        $response[$i]['payment'] = $row['payment'];
        $response[$i]['tavolina'] = $row['tavolina'];
        $response[$i]['koha'] = $row['koha'];
        $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}   

?>