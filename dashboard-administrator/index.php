<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="stylee.css">
</head>
<style>
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
</style>
<body>
<header>
     <img class="imazhi" src="./img/logo.png">
 </header>
    
     <form action="login.php" method="post">
	<center> <img  class="imazh" src="./img/user.png"></center>
     	<h2>Login</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>


     	<label><br>Username :</b></label><br>
     	<input type="text" name="uname" placeholder="Username"><br>

     	<label><br>Password:</br></label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<center><button type="submit">Login</button></center>
     </form>
</body>
</html>