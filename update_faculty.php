<?php
require('db.php');



if (isset($_REQUEST['faculty'])) {

  $faculty_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
 $workshop_topic = mysqli_real_escape_string($conn, $_REQUEST['workshop_id']);
 
 


  $update_query="update faculty set faculty_id='$faculty_id',name='$name',mobileno='$mobileno',workshop_topic='$workshop_topic' where faculty_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>faculty Area Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from faculty where faculty_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  


?>
<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>UPDATE FACULTY</h3></div>
		 <?php  
    echo @$err;

    ?>
		<label class="mt-3">FACULTY ID</label>
		<input type="text" name="id" value="<?php echo @$res['faculty_id'];?>" class="form-control">
		<label class="mt-3">NAME</label>
		<input type="text" name="name" value="<?php echo @$res['name'];?>" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" value="<?php echo @$res['mobileno'];?>" class="form-control">
     <label class="mt-3">WORKSHOP TOPIC</label>
    <select class="form-control" name="workshop_id" value="<?php echo @$res['workshop_topic'];?>">
      <?php
      $student_query="select workshop_id,topic from workshop";
      $student_sql=mysqli_query($conn,$student_query);
      while ($row=mysqli_fetch_array($student_sql)) {
        
      echo "<option value='".$row['workshop_id']."'>".$row['workshop_id']." - ".$row['topic']."</option>";    }


      ?>
    </select>
		<button class="btn btn-dark mt-3" type="submit" name="faculty">UPDATE</button>
	</form>
</div