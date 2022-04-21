<?php 

session_start(); 
include "db_conn.php";

if (isset($_GET['id'])) {  
     $id = $_GET['id'];  
     $query = "DELETE FROM `card` WHERE id = '$id'";  
     $run = mysqli_query($conn,$query);  
     if ($run) {  
          header('location:home.php');  
     }else{  
          echo "Error: ".mysqli_error($conn);  
     }  
}  
?>  


