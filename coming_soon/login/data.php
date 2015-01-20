<?php
	session_start();
	if (!isset($_SESSION['email'])) header("Location: index.php");
	include '../inc/db_connect.php';	

	$sql = "SELECT `document_verify`,`payment_verified`,`city`,`payment_type`,`payment_reciept`,`name`,`n1`,`c1`,`n2`,`c2`,`arr_timestamp`,`dep_timestamp`,`ticket`,`acco`,`tshirt` FROM `".TBL_NAME."` WHERE `id`=".$_SESSION["id"];
	$result=mysqli_query($db_connection,$sql);
	if (!($result)) {
		die("0");
	}
	else{
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		echo json_encode($row);

	}


?>