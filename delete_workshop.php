<?php
require('db.php');
	
	$inf=$_GET['id'];
	$sql_query="DELETE FROM workshop WHERE workshop_id='$inf' ";
	$delete=mysqli_query($conn,$sql_query);
	if ($delete) {
		header("location:home.php?info=manage_workshop");
	}else{
		echo "not".mysqli_error($conn);
	}
	
?>

