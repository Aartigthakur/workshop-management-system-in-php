<?php
require('db.php');


$name="";



if (isset($_POST['name'])) {
	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>student_Id</th>";
	echo "<th>Name</th>";
	echo "<th>Mobile No</th>";
	echo "<th>email</th>";
	echo "<th>college</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$name=$_POST['name'];


		$que=mysqli_query($conn,"select * from student where name='$name'");
		if(mysqli_num_rows($que) > 0){
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['student_id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['mobileno']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['college']."</td>";
		echo "<td><a href='home.php?id=$row[student_id]&info=update_student'><i class='fas fa-pencil-alt'></i></a></td>";
		echo  "<td><a href='home.php?id=$row[workshop_id]&info=delete_student'><i class='fas fa-trash-alt'></i></a></td>";

	}
}else{
	echo "<div class='alert alert-warning'><b>0 result</b></div>";
}
	
}



	
?>






<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<h3 class="lead">SEARCH student</h3>
		<input type="text" name="name" class="form-control" placeholder="ENTER student NAME">
	</form>
</div>
<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_student.php?id='+id;
     }
}
</script> 