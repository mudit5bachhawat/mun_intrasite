<?php
	session_start();
	//error_reporting(0);
	if (!isset($_SESSION['email'])) header("Location: index.php");
	include '../inc/db_connect.php';	

	$n1=mysqli_real_escape_string($db_connection,$_POST['n1']);
	$c1=mysqli_real_escape_string($db_connection,$_POST['c1']);
	$n2=mysqli_real_escape_string($db_connection,$_POST['n2']);
	$c2=mysqli_real_escape_string($db_connection,$_POST['c2']);
	$arr_timestamp=mysqli_real_escape_string($db_connection,$_POST['arr_timestamp']);
	$dep_timestamp=mysqli_real_escape_string($db_connection,$_POST['dep_timestamp']);
	$ticket=mysqli_real_escape_string($db_connection,$_POST['ticket']);
	$acco=mysqli_real_escape_string($db_connection,$_POST['acco']);
	$tshirt=mysqli_real_escape_string($db_connection,$_POST['tshirt']);
	$stage="1";

	$sql = "UPDATE `".TBL_NAME."` SET `n1` = '".$n1."', `c1` = '".$c1."', `n2` = '".$n2."', `c2` = '".$c2."', `stage` = '".$stage."', `arr_timestamp` = '".$arr_timestamp."', `dep_timestamp` = '".$dep_timestamp."', `ticket` = '".$ticket."', `acco` = '".$acco."', `tshirt` = '".$tshirt."' WHERE `reg_data`.`id` = '".$_SESSION["id"]."';";
	//echo $sql;
	//$sql = "INSERT INTO `".TBL_NAME."` (`n1`, `c1`, `n2`, `c2`, `arr_timestamp`, `dep_timestamp`, `ticket`,`acco`,`tshirt`,`stage`) VALUES ('".$n1."', '".$c1."', '".$n2."', '".$c2."', '".$arr_timestamp."', '".$dep_timestamp."', '".$ticket."', '".$acco."', '".$tshirt."', '".$stage."')";
	//echo "$sql";
	if (!mysqli_query($db_connection,$sql)) {
		die("0");
	}
	else{
		$id=$_SESSION['id']; 
		$_SESSION["stage"]="1";
		$dirPath=HOME."letter/".$id."/";
		if (!file_exists($dirPath)) mkdir($dirPath);
	    if ( 0 < $_FILES['letter']['error'] ) {
	        echo 'Error: ' . $_FILES['letter']['error'] . '<br>';
	    }
	    else {
	        move_uploaded_file($_FILES['letter']['tmp_name'], $dirPath. $_FILES['letter']['name']);
	    }
		
		die("1");
	}


?>