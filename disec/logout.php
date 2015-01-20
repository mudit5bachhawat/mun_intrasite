<?php
	session_start();
	//include_once("includes/connectDB.php");
	session_regenerate_id(); 	
	///////////////////////////*
	if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
	}
	/////////////////////////////
	$_SESSION=array();
	echo session_destroy();
	
	header("Location: login.php");
?>