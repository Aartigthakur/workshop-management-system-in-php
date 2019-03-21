<?php
require('db.php');


$name="";



if (isset($_POST['name'])) {
	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>college_Id</th>";
	echo "<th>Name</th>";
	echo "<th> No of students</th>";
	echo "<th>faculty</th>";
	echo "<th>workshop_id</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$name=$_POST['name'];


		$que=mysqli_query($conn,"select * from college where name='$name'");
		if(mysqli_num_rows($que) > 0){
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['college_id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['no']."</td>";
		echo "<td>".$row['faculty']."</td>";
		echo "<td>".$row['workshop_id']."</td>";
		echo "<td><a href='home.php?id=$row[college_id]&info=update_college'><i class='fas fa-pencil-alt'></i></a></td>";
		echo  "<td><a href='home.php?id=$row[workshop_id]&info=delete_college'><i class='fas fa-trash-alt'></i></a></td>";

	}
}else{
	echo "<div class='alert alert-warning'><b>0 result</b></div>";
}
	
}



	
?>






<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<h3 class="lead">SEARCH college</h3>
		<input type="text" name="name" class="form-control" placeholder="ENTER college NAME">
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