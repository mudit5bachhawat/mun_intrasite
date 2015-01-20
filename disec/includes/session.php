<?php

	$logon_val=0;
	
		if (isset($_SESSION["user_name"]))
		{
			if  (substr($_SESSION["user_name"], 0,2) == "EB") {$logon_val= 1;}
			elseif  (substr($_SESSION["user_name"], 0,2) == "IP") {$logon_val= 2;}
			else {$logon_val= 3;}
		}
		else $logon_val= 0;
	
	function is_logon()
	{
		global $logon_val;
		return $logon_val;
	}

	function redirect()
	{
		if (is_logon()==1) header('Location: main_eb.php');
		elseif (is_logon()==2) header('Location: main_ip.php');
		elseif (is_logon()==3) header('Location: main_dg.php');
		return 0;
	}

?>