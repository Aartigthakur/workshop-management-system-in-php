<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['college'])) {

  $college_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $no = mysqli_real_escape_string($conn, $_REQUEST['no']);
  $faculty = mysqli_real_escape_string($conn, $_REQUEST['faculty']);
   $workshop_id = mysqli_real_escape_string($conn, $_REQUEST['workshop_id']);
  
  
  $user_check_query = "SELECT * FROM college WHERE college_id='$college_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['college_id'] === $college_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }


  if (count($errors) == 0) {
  

    $query = "INSERT INTO college (college_id,name,no,faculty,workshop_id) 
          VALUES('$college_id','$name','$no','$faculty','$workshop_id')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>college added successfully</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>college not added</b></div>";
    }
  }
}



?>





<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>ADD COLLEGE</h3>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">COLLEGE ID</label>
		<input type="text" name="id" class="form-control">
		<label class="mt-3">COLLEGE NAME</label>
		<input type="text" name="name" class="form-control">
		<label class="mt-3">NO OF STUDENTS</label>
		<input type="text" name="no" class="form-control">
		<label class="mt-3">FACULTY</label>
    <select class="form-control" name="faculty">
      <?php
      $student_query="select name from faculty";
      $student_sql=mysqli_query($conn,$student_query);
      while ($row=mysqli_fetch_array($student_sql)) {
        
      echo "<option value='".$row['name']."'>".$row['name']."</option>";    }


      ?>
    </select>
		<label class="mt-3">WORKSHOP ID</label>
    <select class="form-control" name="workshop_id">
      <?php
      $student_query="select workshop_id,topic from workshop";
      $student_sql=mysqli_query($conn,$student_query);
      while ($row=mysqli_fetch_array($student_sql)) {
        
      echo "<option value='".$row['workshop_id']."'>".$row['workshop_id']." - ".$row['topic']."</option>";    }


      ?>
    </select>
		<button class="btn btn-dark mt-3" type="submit" name="college">ADD</button>
	</form>
</div>