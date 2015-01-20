<?php

	session_name("admin");
	session_start();
	//error_reporting(0);
	if (!isset($_SESSION['email'])) header("Location: index.php");
	include '../inc/db_connect.php';	

	$field=mysqli_real_escape_string($db_connection,$_POST['field']);
	$value=mysqli_real_escape_string($db_connection,$_POST['value']);
	$id=mysqli_real_escape_string($db_connection,$_POST['id']);

	$sql = "UPDATE `".TBL_NAME."` SET `$field` = '".$value."' WHERE `reg_data`.`id` = '".$id."';";

	if (!mysqli_query($db_connection,$sql)) {
		die("0");
	}
	else{
		die("1");
	}


?>