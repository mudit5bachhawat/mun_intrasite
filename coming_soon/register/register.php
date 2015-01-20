<?php
	
	function renderHTML($text,$var,$val){
		return str_replace("<<".$var.">>",$val,$text);
	}

	function server_parse($socket, $expected_response)
	{
	    $server_response = '';
	    while (substr($server_response, 3, 1) != ' ')
	    {
	        if (!($server_response = fgets($socket, 256)))
	            echo 'Couldn\'t get mail server response codes. Please contact the forum administrator.', __FILE__, __LINE__;
	    }
	 
	    if (!(substr($server_response, 0, 3) == $expected_response))
	        echo 'Unable to send e-mail. Please contact the forum administrator with the following error message reported by the SMTP server: "'.$server_response.'"', __FILE__, __LINE__;
	}

	function smtp_mail($to, $subject, $message, $headers = '')
	{
	    $recipients = explode(',', $to);
	    $user = 'noreply10@ecell-iitkgp.org';
	    $pass = 'webmail10';
	    $smtp_host = 'ssl://smtp.gmail.com';
	    $smtp_port = 465;
	 
	 
	    if (!($socket = fsockopen($smtp_host, $smtp_port, $errno, $errstr, 15)))
	        echo "Could not connect to smtp host '$smtp_host' ($errno) ($errstr)", __FILE__, __LINE__;
	 
	    server_parse($socket, '220');
	 
	    fwrite($socket, 'EHLO '.$smtp_host."\r\n");
	    server_parse($socket, '250');
	 
	    fwrite($socket, 'AUTH LOGIN'."\r\n");
	    server_parse($socket, '334');
	 
	    fwrite($socket, base64_encode($user)."\r\n");
	    server_parse($socket, '334');
	 
	    fwrite($socket, base64_encode($pass)."\r\n");
	    server_parse($socket, '235');
	 
	 
	 
	    fwrite($socket, 'MAIL FROM: <example@gmail.com>'."\r\n");
	    server_parse($socket, '250');
	 
	    foreach ($recipients as $email)
	    {
	        fwrite($socket, 'RCPT TO: <'.$email.'>'."\r\n");
	        server_parse($socket, '250');
	    }
	 
	    fwrite($socket, 'DATA'."\r\n");
	    server_parse($socket, '354');
	 
	    fwrite($socket, 'Subject: '.$subject."\r\n".'To: <'.implode('>, <', $recipients).'>'."\r\n".$headers."\r\n\r\n".$message."\r\n");
	 
	    fwrite($socket, '.'."\r\n");
	    server_parse($socket, '250');
	 
	    fwrite($socket, 'QUIT'."\r\n");
	    fclose($socket);
	 
	    return true;
	}


if (isset($_POST['name']))
{
	include '../inc/db_connect.php';	

	$name=mysqli_real_escape_string($db_connection,$_POST['name']);
	$gender=mysqli_real_escape_string($db_connection,$_POST['gender']);
	$designation=mysqli_real_escape_string($db_connection,$_POST['designation']);
	$city=mysqli_real_escape_string($db_connection,$_POST['city']);
	$college=mysqli_real_escape_string($db_connection,$_POST['college']);
	$faculty=mysqli_real_escape_string($db_connection,$_POST['faculty']);
	$email=mysqli_real_escape_string($db_connection,$_POST['email']);
	$mobile=mysqli_real_escape_string($db_connection,$_POST['mobile']);
	$password=mysqli_real_escape_string($db_connection,$_POST['password']);
	$password=md5($password);
	$capcha=md5($mobile.$email);




	if (mysqli_num_rows(mysqli_query($db_connection,"SELECT * FROM ".TBL_NAME." WHERE email='$email'"))>0) die("-1");
	$sql = "INSERT INTO `".TBL_NAME."` (`name`, `password`, `gender`, `designation`, `city`, `college`, `mobile`,`email`,`capcha`) VALUES ('".$name."', '".$password."', '".$gender."', '".$designation."', '".$city."', '".$college."', '".$mobile."', '".$email."', '".$capcha."')";
	//echo "$sql";
	if (!mysqli_query($db_connection,$sql)) {
		die("0");
	}
	else{
		$id=mysqli_insert_id($db_connection); 
		$dirPath=HOME."resume/".$id."/";
		mkdir($dirPath);
	    if ( 0 < $_FILES['resume']['error'] ) {
	        echo 'Error: ' . $_FILES['resume']['error'] . '<br>';
	    }
	    else {
	        move_uploaded_file($_FILES['resume']['tmp_name'], $dirPath. $_FILES['resume']['name']);
	    }

		$recipients = ( $email ); # Can be one or more emails

		$headers = "MIME-Version: 1.0\r\n";
		$headers = "From: Entrepreneurship Cell <noreply1@ecell-iitkgp.org>\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

		$myfile = fopen("register.template", "r") or die("Unable to open file!");
		$body= fread($myfile,filesize("register.template"));
		fclose($myfile);
		$body=renderHTML($body,"name",$name);
		$body=renderHTML($body,"capcha",$capcha);
		$body=renderHTML($body,"email",$email);

		smtp_mail($recipients,"Global Entrepreneurship Summit 2015 - Registration Initiated",  $body,$headers);

		
		die("1");
	}
}
?>