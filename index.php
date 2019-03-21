<?php
session_start();
require('db.php');

$username="";
$errors = array(); 


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

  if (empty($username)) {
    array_push($errors, "<div class='alert alert-warning'><b>Username is required</b></div>");
  }
  if (empty($pwd)) {
    array_push($errors, "<div class='alert alert-warning'><b>Password is required</b></div>");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM login WHERE uname='$username' AND pwd='$pwd'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['uname'] = $username;
      header("location:home.php");
    }else {
      array_push($errors, "<div class='alert alert-warning'><b>Wrong username/password combination</b></div>");

    }
  }
}

?>





<!DOCTYPE html>
<html>
<head>
	<title>Workshop Management System</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style type="text/css">
  	body{

  		background-image: url(images/wr_bg.jpg);
  		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;
  		background-attachment: fixed;
  
 
  </style>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-warning navbar-dark">
		<div class="container-fluid">
  <a class="navbar-brand" href="index.php">WORKSHOP MANAGEMENT SYSTEM</a>
</div>
</nav>
<div class="row" style="margin-top: 300px;">
	<div class="col-md-4 col-sm-12" ></div>
	<div class="col-md-4 col-sm-12" >
		<div class="container">
		<form class="form-group mt-2 text-center" method="post" action="">
      <?php include('errors.php'); ?>
			<input type="text" name="username" class="form-control mt-2" placeholder="USERNAME">
			<input type="password" name="pwd" class="form-control mt-2" placeholder="PASSWORD">
			<button class="btn btn-outline-dark mt-2" type="submit" name="login_user">Login</button>
		</form>
	</div>
	</div>
    <div class="col-md-4 col-sm-12" ></div>
</div>



</body>
</html>