<?php
	session_start();
	//error_reporting(0);
	if (!isset($_SESSION['email'])) header("Location: index.php");
	include '../inc/db_connect.php';	

	$reciept=mysqli_real_escape_string($db_connection,$_POST['ref']);
	$type=mysqli_real_escape_string($db_connection,$_POST['type']);


	$sql = "UPDATE `".TBL_NAME."` SET  `payment_type` = '".$type."',`payment_reciept` = '".$reciept."' WHERE `reg_data`.`id` = '".$_SESSION["id"]."';";
	//echo $sql;
	//$sql = "INSERT INTO `".TBL_NAME."` (`n1`, `c1`, `n2`, `c2`, `arr_timestamp`, `dep_timestamp`, `ticket`,`acco`,`tshirt`,`stage`) VALUES ('".$n1."', '".$c1."', '".$n2."', '".$c2."', '".$arr_timestamp."', '".$dep_timestamp."', '".$ticket."', '".$acco."', '".$tshirt."', '".$stage."')";
	//echo "$sql";
	if (!mysqli_query($db_connection,$sql)) {
		die("0");
	}
	else{
		$id=$_SESSION['id']; 
		$dirPath=HOME."reciept/".$id."/";
		
		if (!file_exists($dirPath)) mkdir($dirPath);
	    if ( 0 < $_FILES['reciept']['error'] ) {
	        echo 'Error: ' . $_FILES['reciept']['error'] . '<br>';
	    }
	    else {
	        move_uploaded_file($_FILES['reciept']['tmp_name'], $dirPath. $_FILES['reciept']['name']);
	    }
		
		die("1");
	}


?>