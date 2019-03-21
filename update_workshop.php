<?php
require('db.php');




if (isset($_REQUEST['workshop'])) {

  $workshop_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $topic = mysqli_real_escape_string($conn, $_REQUEST['topic']);
  $date = mysqli_real_escape_string($conn, $_REQUEST['date']);
  $fees = mysqli_real_escape_string($conn, $_REQUEST['fees']);


  $update_query="update workshop set workshop_id='$workshop_id',topic='$topic',date='$date',fees='$fees' where workshop_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>Workshop Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from workshop where workshop_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  



?>






<div class="container mt-3">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>UPDATE WORKSHOP</h3></div>
		 <?php 
    echo @$err;

    ?>
		<label class="mt-3">WORKSHOP ID</label>
		<input type="text" name="id" value="<?php echo @$res['workshop_id'];?>" class="form-control">
		<label class="mt-3">TOPIC</label>
		<input type="text" name="topic" value="<?php echo @$res['topic'];?>" class="form-control">
		<label class="mt-3">DATE</label>
		<input type="text" name="date" value="<?php echo @$res['date'];?>" class="form-control">
		<label class="mt-3">FEES</label>
		<input type="text" name="fees" value="<?php echo @$res['fees'];?>" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="workshop">UPDATE</button>
	</form>
</div>