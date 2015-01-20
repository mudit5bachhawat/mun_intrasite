<?php
	session_start();

	require_once("includes/connectDB.php");
	//Redirect to corresponding pages
	redirect();

	if (isset($_GET['submit']))
	{
		$query='SELECT * FROM tbl_user WHERE user_name="' . $_GET['id'].'" AND password="'.$_GET['pwd'].'"';
		$result=mysqli_query($db_connection,$query);
		if (mysqli_num_rows($result)==0) die("<h1>Invalid user id or password</h1>");
		elseif  (mysqli_num_rows($result)>1) die("<h1>Duplicate entry found</h1>");
		else 
			{
				$row = mysqli_fetch_array($result);
				$_SESSION['user_name']=$row['user_name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['institute']=$row['institute'];
				$_SESSION['user_name']=$row['user_name'];
					
				header("Location: login.php");
			echo ($query . " " . mysqli_num_rows($result)." ");

			}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>IIT KGP MUN 2015</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen"><!--Manual Style-->
	
    <!--Font-->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../js/jquery.js"></script>    

  </head>
  <body>
  	<div>
    	<img src="res/mun-bg.jpg" alt="header" class="center-block container">
        </div> 
    </div>
    </div>	<div class="container">
    	<div ><!-- class="col-md-4 col-md-offset-4" -->
    		
	    	<div class="panel panel-info">
	        	<div class="panel-heading text-center">
	            <h2>UNHCR</h2>
	            </div>
	            <div class="panel-body">
	            <form role="login" method="get">
	            	<div class="form-group">
	                	<label class="input" for="login_id">Login ID</label>
	                    <select name="id" id="login_id" class="form-control input">
	                            <option>IP1</option>
	                            <option>IP2</option>
	                            <option>EB1</option>
	                            <option>EB2</option>
	                            <option disabled>----------------</option>
							<option>Afghanistan</option>
							<option>Australia</option>
	                    </select>
	                </div>
	                <div class="form-group">
	                	<label class="input" for="password">Password</label>
	                    <input name="pwd" id="password" type="password" class="form-control input" required>
	                </div>
	                
	                <button name="submit" type="submit" class="btn btn btn-success" value="Login">Login</button>
	            </form>
	            
	            
	            </div>
	        </div>


    	</div>
    </div>
    <div class="jumbotron" style="padding:5px;margin-bottom:0px;font-size:medium"><small class="pull-right ">Site Created By <a href="#">Mudit Bachhawat</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
    <div class="clearfix"></div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
    mysqli_close($db_connection);
?>
