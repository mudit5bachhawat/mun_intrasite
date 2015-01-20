<?php

{
	include '../inc/db_connect.php';	


	$college=mysqli_real_escape_string($db_connection,$_GET['college']);


	$sql = "SELECT city,count(city) FROM "."collegeDB"." WHERE designation='Faculty' GROUP BY city";
	
	if (!($result=mysqli_query($db_connection,$sql))) {
		die("0");
	}
	else{
		echo "<option>"."Select a City"."</option>" ;

		while ($row = mysqli_fetch_array($result)) {
			echo "<option>".$row["city"]."</option>" ;
		}

	}
}
?>