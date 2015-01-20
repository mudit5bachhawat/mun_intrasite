<?php
	session_start();

	require_once("includes/connectDB.php");
	//Redirect to corresponding pages
	redirect();

	if (isset($_GET['submit']))
	{
		$query='SELECT * FROM tbl_user WHERE user_name="' . $_GET['id'].'" AND password="'.$_GET['pwd'].'"';
		//$query='SELECT * FROM tbl_user WHERE user_name = "IP1" AND ( PASSWORD = "l" OR "1" = "1")';
		$result=mysqli_query($db_connection,$query);
		echo $query;
		
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
    	<div class="panel panel-info">
        	<div class="panel-heading text-center">
            <h2>UNHCR</h2>
            </div>
            <div class="panel-body">
            <form role="login" method="get">
            	<div class="form-group">
                	<label class="input-lg" for="login_id">Login ID</label>
                    <select name="id" id="login_id" class="form-control input-lg">
                            <option>IP1</option>
                            <option>IP2</option>
                            <option>EB1</option>
                            <option>EB2</option>
                            <option disabled>----------------</option>
						<option>Afghanistan</option>
						<option>Argentina</option>
						<option>Armenia</option>
						<option>Australia</option>
						<option>Azerbaijian</option>
						<option>Belarus</option>
						<option>Belize</option>
						<option>Brazil</option>
						<option>Brunei</option>
						<option>Bulgaria</option>
						<option>Canada</option>
						<option>Central African Republic</option>
						<option>Chad</option>
						<option>China</option>
						<option>Colombia</option>
						<option>Cuba</option>
						<option>Cyprus</option>
						<option>Denmark</option>
						<option>Djibouti</option>
						<option>Ecuador</option>
						<option>France</option>
						<option>Gabon</option>
						<option>Georgia</option>
						<option>Germany</option>
						<option>Greece</option>
						<option>India</option>
						<option>Indonesia</option>
						<option>Iran</option>
						<option>Iraq</option>
						<option>Israel</option>
						<option>Italy</option>
						<option>Ivory Coast</option>
						<option>Japan</option>
						<option>Jordan</option>
						<option>Kazakhstan</option>
						<option>Kenya</option>
						<option>Kosovo</option>
						<option>Kuwait</option>
						<option>Malasyia</option>
						<option>Mexico</option>
						<option>Netherlands</option>
						<option>Nigeria</option>
						<option>North Korea</option>

						<option>Oman</option>
						<option>Pakistan</option>

						<option>Philippines</option>
						<option>Poland</option>
						<option>Portugal</option>
						<option>Qatar</option>

						<option>Russia</option>
						<option>South Korea</option>
						<option>Saudi Arabia</option>

						<option>Senegal</option>
						<option>Singapore</option>
						<option>Spain</option>
						<option>Sweden</option>
						<option>Switzerland</option>
						<option>Syria</option>
						<option>Taiwan</option>
						<option>Tajikistan</option>

						<option>Turkey</option>

						<option>Uganda</option>
						<option>UK</option>
						<option>Ukraine</option>
						<option>United Arab Emirates</option>
						<option>USA</option>
						<option>Yemen</option>
                    </select>
                </div>
                <div class="form-group">
                	<label class="input-lg" for="password">Password</label>
                    <input name="pwd" id="password" type="password" class="form-control input-lg" required>
                </div>
                
                <button name="submit" type="submit" class="btn btn-lg btn-success" value="Login">Login</button>
            </form>
            
            
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
