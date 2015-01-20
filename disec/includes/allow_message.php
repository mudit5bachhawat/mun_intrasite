<?php
	session_start();
	include_once('connectDB.php');
	if ((is_logon()==0)||(is_logon()==3)||(is_logon()==1)) die("<h1>You dont have access.<h1>");
	$index=$_POST['index'];
	if ($_POST['type']) $result = mysqli_query($db_connection,"UPDATE  `db_disec`.`tbl_message` SET  `verify` =  '1' WHERE  `tbl_message`.`index` =". $index );
	else $result = mysqli_query($db_connection,"DELETE FROM `db_disec`.`tbl_message` WHERE `tbl_message`.`index` = ". $index );
	//echo "UPDATE  `db_disec`.`tbl_message` SET  `verify` =  '1' WHERE  `tbl_message`.`index` =". $index;
	echo $result;
?>