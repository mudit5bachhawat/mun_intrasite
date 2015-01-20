<?php
		session_start();
	include_once('connectDB.php');
	if ((is_logon()==0)||(is_logon()==3)) die('You dont have access.');
    if (isset($_POST['txt_notification'])) 
	{
		$result = mysqli_query($db_connection,"INSERT INTO  `tbl_notification` (`id` ,`message` ,`message_from` ,`time_stamp`)VALUES (NULL ,  '".$_POST['txt_notification']."',  '".$_SESSION['user_name']."', CURRENT_TIMESTAMP)");
	}
	
	header("Location: ../login.php");
?>