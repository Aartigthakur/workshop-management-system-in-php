<?php
require('db.php');



if (isset($_REQUEST['college'])) {

  $college_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $no = mysqli_real_escape_string($conn, $_REQUEST['no']);
 $faculty = mysqli_real_escape_string($conn, $_REQUEST['faculty']);
 $workshop_id = mysqli_real_escape_string($conn, $_REQUEST['workshop_id']);
 


  $update_query="update college set college_id='$college_id',name='$name',no='$no',faculty='$faculty',workshop_id='$workshop_id' where college_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>college Area Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from college where college_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  


?>
<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>UPDATE college</h3></div>
		 <?php  
    echo @$err;

    ?>
		<label class="mt-3">COLLEGE ID</label>
		<input type="text" name="id" value="<?php echo @$res['college_id'];?>" class="form-control">
		<label class="mt-3">COLLEGE NAME</label>
		<input type="text" name="name"  value="<?php echo @$res['name'];?>" class="form-control">
		<label class="mt-3">NO OF STUDENTS</label>
		<input type="text" name="no"  value="<?php echo @$res['no'];?>" class="form-control">
		<label class="mt-3">FACULTY</label>
    <select class="form-control"  value="<?php echo @$res['faculty'];?>" name="faculty">
      <?php
      $student_query="select name from faculty";
      $student_sql=mysqli_query($conn,$student_query);
      while ($row=mysqli_fetch_array($student_sql)) {
        
      echo "<option value='".$row['name']."'>".$row['name']."</option>";    }


      ?>
    </select>
		<label class="mt-3">WORKSHOP ID</label>
    <select class="form-control" value="<?php echo @$res['workshop_id'];?>" name="workshop_id">
      <?php
      $student_query="select workshop_id,topic from workshop";
      $student_sql=mysqli_query($conn,$student_query);
      while ($row=mysqli_fetch_array($student_sql)) {
        
      echo "<option value='".$row['workshop_id']."'>".$row['workshop_id']." - ".$row['topic']."</option>";    }


      ?>
    </select>
		<button class="btn btn-dark mt-3" type="submit" name="college">UPDATE</button>
	</form>
</div>