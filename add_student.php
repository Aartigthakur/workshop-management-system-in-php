s<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['student'])) {

  $student_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']); 
  $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
   $college = mysqli_real_escape_string($conn, $_REQUEST['college']);
  $workshop_id = mysqli_real_escape_string($conn, $_REQUEST['workshop_id']);
 
  
  
  $user_check_query = "SELECT * FROM student WHERE student_id='$student_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['student_id'] === $student_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }


  if (count($errors) == 0) {
  

    $query = "INSERT INTO student (student_id,name,mobileno,email,college,workshop_id) 
          VALUES('$student_id','$name','$mobileno','$email','$college','$workshop_id')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>student added successfully</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>student not added</b></div>";
    }
  }
}



?>






<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>ADD STUDENT</h3></div>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">STUDENT ID</label>
		<input type="text" name="id" class="form-control">
		<label class="mt-3">NAME</label>
		<input type="text" name="name" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" class="form-control">
    <label class="mt-3">EMAIL ID</label>
    <input type="text" name="email" class="form-control">
		<label class="mt-3">COLLEGE</label>
		<input type="text" name="college" class="form-control">
		 <label class="mt-3">WORKSHOP ID</label>
    <select class="form-control" name="workshop_id">
      <?php
      $student_query="select workshop_id,topic from workshop";
      $student_sql=mysqli_query($conn,$student_query);
      while ($row=mysqli_fetch_array($student_sql)) {
        
      echo "<option value='".$row['workshop_id']."'>".$row['workshop_id']." - ".$row['topic']."</option>";    }


      ?>
    </select>

		<button class="btn btn-dark mt-3" type="submit" name="student">ADD</button>
	</form> 
</div>