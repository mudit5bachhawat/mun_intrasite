<?php
	session_start();
	include_once('connectDB.php');
	if (is_logon()==0) die('You dont have access.');
	$verify=0;
	if ((substr($_POST['message_to'],0,2)=="IP")||(substr($_POST['message_to'],0,2)=="EB")) $verify=1;
	if ((is_logon()==1)||(is_logon()==2)) $verify=1;
	$result = mysqli_query($db_connection,"INSERT INTO tbl_message (message_from, message_to, message,verify, time_stamp) VALUES ( '".$_POST['message_from']."', '".$_POST['message_to']."', '".$_POST['message']."',". $verify .", CURRENT_TIMESTAMP)");
	echo $result;
?>