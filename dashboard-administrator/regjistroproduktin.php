<?php 
session_start();
include "db_conn.php";

include("addproducts.php");


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

    form {
       
    flex-direction: column;
    align-items: stretch;
           padding: 10px;
         margin: 5px;
         box-sizing: border-box;
    } 

    input[type=text], input[type=number] {
  width: 100%;  
  padding: 15px;  
  margin: 5px 0 22px 0;  
  display: inline-block;  
  border: none; 
    background: #A20025;
    color: white;
    
    
  }



  hr {  
  border: 1px solid #f1f1f1;  
  margin-bottom: 25px;  
}  



.registerbtn {  
  background-color: #A20025;  
  color: white;  
  padding: 16px 20px;  
  margin: 8px 0;  
  border: none;  
  /* margin-left: 50px; */
  cursor: pointer;  
  width: 50%;  
  opacity: 0.9;  
}  
.registerbtn:hover {  
  opacity: 1;  
}  

.nowrap {
    white-space: nowrap;
}

.form {
  display: table;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  
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

     <header style="margin-bottom: 50px;">
     <img class="imazhi" src="./img/logo.png">
     <br>
     <center><h2>Regjistro produktet e reja</h2></center>
     <hr>
     </header> 

      <section>
      <!-- <center><h2>Regjistro produktet e reja</h2></center>
     <hr> -->
      <form method="POST" action="addproducts.php">
<table align="center" width="500" >
<tr>
<th><label for="id">ID e produktit: </label></th>
<td><input type="text" name="id"></td>
</tr>
<tr>
<th><label for="title">Emri i produktit: </label></th>
<td><input type="text" name="title"></td>
</tr>
<tr>
<th><label for="category">Kategoria: </label> </th>
<td><input type="text" name="category"></td>
</tr>
<tr>
<th><label for="price">Cmimi: </label></th>
<td><input type="number" step="any" name="price"></td>
</tr>
<tr>
<th><label for="img" >Foto e produktit:</label></th>
<td><input type="text" name="img"></td>
</tr>
<tr>
<th><label for="description"> Pershkrimi:</label></th>
<td><input type="text" name="description"></td>
</tr>
<br>
<tr>
<td colspan="3" align="center"><button type="submit" name="submit" class="registerbtn">Regjistro produktin</button>
</td>
</tr>
</table>
</form>
</body>
      </section>


      </div>
      
    
      </body>
      </html>