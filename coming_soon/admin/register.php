<?php
	session_start();

    if (isset($_SESSION['email'])) header("Location: dashboard.php");

	include_once("inc/db.php");
	
	if (isset($_POST['email']) && (($_POST['master_password'])=="spider_web"))
	{
		
		$email=mysqli_real_escape_string($db_connection,$_POST['email']);
		$pwd=mysqli_real_escape_string($db_connection,$_POST['password']);
		$pwd=md5($pwd);
		$query="INSERT INTO `db_2014_15`.`cap_user` (`email`, `password`) VALUES ( '$email', '$pwd')";
		$result=mysqli_query($db_connection,$query);

        if (!$result) {
            die(mysqli_error($db_connection));
        }

		if ($result) 
		{
			$row = mysqli_fetch_array($result);
			$_SESSION['name']=$row['name'];
			$_SESSION['email']=$email;
			header("Location: dashboard.php");
		}
        else
        {
            $invalid=true;
        }
	}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" type="image/png">
    <link rel="shortcut icon" href="../favicon.ico" type="image/ico">
    <title>Admin Panel</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please :</h3>
                    </div>
                    <div class="panel-body">
                        <?php if ($invalid==true) { ?><h4 class="text-danger">Invalid username or password</h4><?php }; ?>
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="email" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Master Password" name="master_password" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                </div>
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">


</script>
    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>
