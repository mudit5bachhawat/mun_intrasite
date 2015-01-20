<?php
if (isset($_GET['city']))
{
	include '../inc/db_connect.php';	


	$city=mysqli_real_escape_string($db_connection,$_GET['city']);


	$sql = "SELECT college,count(college) FROM "."collegeDB"." WHERE city='".$city."'  GROUP BY college";
	//echo "$sql";
	
	if (!($result=mysqli_query($db_connection,$sql))) {
		die("0");
	}
	else{
		echo "<option>"."Select a college"."</option>" ;
		while ($row = mysqli_fetch_array($result)) {
			echo "<option>".$row["college"]."</option>" ;
		}

	}
}
?>