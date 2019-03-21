


<!DOCTYPE html>
<html>
<head>
	<title>workshop management system</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  
</head>
<body>


	<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <a class="navbar-brand" href="#">WORKSHOP MANAGEMENT SYSTEM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Workshop
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="home.php?info=add_workshop">Add Workshop</a><hr>
          <a class="dropdown-item" href="home.php?info=manage_workshop">Manage Workshop</a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Student
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="home.php?info=add_student">Add Student</a><hr>
          <a class="dropdown-item" href="home.php?info=manage_student">Manage Student</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Faculty
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="home.php?info=add_faculty">Add Faculty</a><hr>
          <a class="dropdown-item" href="home.php?info=manage_faculty">Manage Faculty</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          College
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="home.php?info=add_college">Add College</a><hr>
          <a class="dropdown-item" href="home.php?info=manage_college">Manage College</a>
      </li>
    </ul>
    <a href="logout.php" class="nav-link">logout</a>
</nav>

  <div class="container">
   <?php

@$info=$_GET['info'];
if ($info!=="") {
             if ($info=="add_workshop") {
             include('add_workshop.php');
                }
             else if($info=="add_student")
             {
             include('add_student.php');
             }
             elseif ($info=="manage_student") {
               include ('manage_student.php');

             }elseif ($info=="add_faculty") {
               include ('add_faculty.php');
             }elseif ($info=="manage_faculty") {
               include ('manage_faculty.php');
             }elseif ($info=="add_college") {
               include ('add_college.php');
             }elseif ($info=="manage_college") {
               include ('manage_college.php');
             }elseif ($info=="manage_workshop") {
               include ('manage_workshop.php');
             }elseif ($info=="update_student") {
               include ('update_student.php');
             }elseif ($info=="delete_student") {
               include ('delete_student.php');
             }elseif ($info=="update_workshop") {
               include ('update_workshop.php');
             }elseif ($info=="delete_workshop") {
               include ('delete_workshop.php');
             }elseif ($info=="update_faculty") {
               include ('update_faculty.php');
             }elseif ($info=="delete_faculty") {
               include ('delete_faculty.php');
             }elseif ($info=="update_college") {
               include ('update_college.php');
             }elseif ($info=="delete_college") {
               include ('delete_college.php');
             }elseif ($info=="change_password") {
               include ('change_password.php');
             }
                      }

?>
  </div>

</body>
</html>