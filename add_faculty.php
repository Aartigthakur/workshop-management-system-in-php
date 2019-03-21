<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['faculty'])) {

  $faculty_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
$topic = mysqli_real_escape_string($conn, $_REQUEST['workshop_id']);
  
  
  $user_check_query = "SELECT * FROM faculty WHERE faculty_id='$faculty_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['faculty_id'] === $faculty_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }


  if (count($errors) == 0) {
  

    $query = "INSERT INTO faculty (faculty_id,name,mobileno,workshop_topic) 
          VALUES('$faculty_id','$name','$mobileno','$topic')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>faculty area added successfully</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>faculty area not added</b></div>";
    }
  }
}



?>




<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>ADD FACULTY</h3>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">FACULTY ID</label>
		<input type="text" name="id" class="form-control">
		<label class="mt-3">NAME</label>
		<input type="text" name="name" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" class="form-control">
     <label class="mt-3">WORKSHOP TOPIC</label>
    <select class="form-control" name="workshop_id">
      <?php
      $student_query="select workshop_id,topic from workshop";
      $student_sql=mysqli_query($conn,$student_query);
      while ($row=mysqli_fetch_array($student_sql)) {
        
      echo "<option value='".$row['workshop_id']."'>".$row['workshop_id']." - ".$row['topic']."</option>";    }


      ?>
    </select>
		<button class="btn btn-dark mt-3" type="submit" name="faculty">ADD</button>
	</form>
</div>