<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

}else{
     header("Location: index.php");
     exit();
}

// $sql = "SELECT* FROM products";
// $result = $conn->query($sql);


 ?>



<!DOCTYPE html>
<head>
<title>DASHBOARD</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="dashboardstyle.css">
</head>

<style type="text/css">
*{
	font-family: Poppins !important;
	font-weight: normal;
  }
  a:link {
            text-decoration: none;
        }
        a:hover {
            text-decoration: none;
        }
    #klientet {
         display: flex;
         justify-content: center;
         align-items: center;
         
         padding: 3px;
    } 

  #klientet th {
     text-align: center;
    padding-top: 12px;
    padding-bottom: 12px;
    padding-left: 10px;
    padding-right: 10px;
    border: 1px solid black;
    
    background-color: #A20025;
    color: white;
  }

  #klientet td {
     text-align: center;
     background-color: white;
     padding: 3px;
  }
  #btn{  
      text-decoration: none;  
      color: #FFF;  
      background-color: #000249;  
      padding: 5px 20px;  
      border-radius: 3px;
      width: 100%;
 }  
 #btn:hover{  
      background-color: #000249;  
 }  

</style>
<body>

<div id="outer-container">
	<div id="sidebar">
               <div class="logo">
                    <img src="./img/user.png" class="imazh" alt=""/>
                  <center> <h3> <?php echo $_SESSION['name']; ?></h3></center> 
                 <center><p class="a"> <a href="logout.php">Logout</a></p></center>

               </div>
               <center><p class="a"> <a href="home.php">Kthehu ne dashboard</a></p></center>
               <center><p><a href="allproducts.php">Të gjitha produktet</a></p></center>
               <center><a href="regjistroproduktin.php">Shto produkte te reja</a></center>

     </div>
	<div id="content">

     <header>
     <img class="imazhi" src="./img/logo.png">

     <center><h2 style="margin-bottom: 50px; color: black">Të gjitha produktet</h2></center>
     </header> 
      <section style="margin-top: 20px">

      <?php

if (isset($_GET['id'])) {  
  $id = $_GET['id'];  
  $query = "DELETE FROM `products` WHERE id = '$id'";  
  $run = mysqli_query($conn,$query);  
  if ($run) {  
       header('location:allproducts.php');  
  }else{  
       echo "Error: ".mysqli_error($conn);  
  }  
}  

$sql = "SELECT* FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table  id=\"klientet\" ><tr><th>Produktet</th><th>Kategoria</th><th>Cmimi</th><th>Pershkrimi</th><th>Fshije kete artikull</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["title"] . "</td><td>" . $row["category"] . "</td><td>" . $row["price"] . "</td> <td>" . $row["description"] . "</td><td>" . "<a href='allproducts.php?id=".$row['id']."' id='btn'>Delete</a>"  ."</td></tr>";
    }
    echo "</table>";
} else {
  echo "<table  id=\"klientet\" ><tr><th>Produktet</th><th>Totali</th><th>Mënyra e pagesës</th><th>Tavolina</th><th>Koha e porosisë</th><th>Printo</th><th>Fshije</th></tr>";
}
?>
      </section>




</div>
      
    
</body>
</html>





