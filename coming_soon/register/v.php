<?php
	include '../inc/db_connect.php';	


	$email=mysqli_real_escape_string($db_connection,$_GET['e']);
	$capcha=mysqli_real_escape_string($db_connection,$_GET['c']);


	if (mysqli_num_rows(mysqli_query($db_connection,"SELECT id FROM ".TBL_NAME." WHERE email='$email' AND capcha='-1'"))==1){
		header("Location: ../login/");
	}
	else if (mysqli_num_rows(mysqli_query($db_connection,"SELECT id FROM ".TBL_NAME." WHERE email='$email' AND capcha='$capcha'"))==1) {
		
		if (mysqli_query($db_connection,"UPDATE ".TBL_NAME." SET  `capcha` = '-1' WHERE email='$email' AND capcha='$capcha'"))
			header("Location: ../login/");
	};

?>