<?php
	include_once('db_config.php');
	include_once('session.php');
    // Create database connection
   $db_connection =mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (mysqli_connect_errno())
    {
        die("Database selection failed: " . mysqli_connect_error());
    }
?>