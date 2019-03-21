<?php
require('db.php');



if (isset($_REQUEST['student'])) {

  $stu_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
 $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
 $college = mysqli_real_escape_string($conn, $_REQUEST['college']);
 


  $update_query="update student set student_id='$stu_id',name='$name',mobileno='$mobileno',email='$email',college='$college' where student_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>Student Area Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from student where student_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  


?>
<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>UPDATE STUDENT</h3></div>
		 <?php  
    echo @$err;

    ?>
		<label class="mt-3">STUDENT ID</label>
		<input type="text" name="id" value="<?php echo @$res['student_id'];?>" class="form-control">
		<label class="mt-3">NAME</label>
		<input type="text" name="name" value="<?php echo @$res['name'];?>" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" value="<?php echo @$res['mobileno'];?>" class="form-control">
		<label class="mt-3">EMAIL ID</label>
		<input type="text" name="email" value="<?php echo @$res['email'];?>" class="form-control">
		
		<label class="mt-3">COLLEGE</label>
		<input type="text" name="college" value="<?php echo @$res['college'];?>" class="form-control">
		
		
		
		<button class="btn btn-dark mt-3" type="submit" name="student">UPDATE</button>
	</form>
</div>