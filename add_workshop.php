<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['workshop'])) {

  $workshop_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $topic = mysqli_real_escape_string($conn, $_REQUEST['topic']);
  $date = mysqli_real_escape_string($conn, $_REQUEST['date']);
  $fees = mysqli_real_escape_string($conn, $_REQUEST['fees']);
  
  
  $user_check_query = "SELECT * FROM workshop WHERE workshop_id='$workshop_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['workshop_id'] === $workshop_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }


  if (count($errors) == 0) {
  

    $query = "INSERT INTO workshop (workshop_id,topic,date,fees) 
          VALUES('$workshop_id','$topic','$date','$fees')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>workshop added successfully</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>workshop not added</b></div>";
    }
  }
}



?>



<div class="container mt-3">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>ADD WORKSHOP</h3></div>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">WORKSHOP ID</label>
		<input type="text" name="id" class="form-control">
		<label class="mt-3">TOPIC</label>
		<input type="text" name="topic" class="form-control">
		<label class="mt-3">DATE</label>
		<input type="text" name="date" class="form-control">
		<label class="mt-3">FEES</label>
		<input type="text" name="fees" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="workshop">ADD</button>
	</form>
</div>