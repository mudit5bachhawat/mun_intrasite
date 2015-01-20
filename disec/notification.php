<?php 
	session_start();
		include_once('includes/connectDB.php');
		if (is_logon()==0) die ("<h1>Please login to access.</a>");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>IIT KGP MUN 2014</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen"><!--Manual Style-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.js"></script>
    <!--Font-->
	<script type="text/javascript" charset="utf-8">
		
    </script>

  </head>
  <body>
  	<div>
    	<img src="res/mun-bg.jpg" alt="header" class="center-block container">
        <div class="navbar navbar-default container" style="width: 1113px;background-color: rgb(244, 244, 250);margin-bottom: 5px;margin-top: 5px;">
        	<img class="pull-left" src="res\flags\<?php echo $_SESSION['user_name'] ?>.jpg" height="40" style="margin-top: 5px;">
            <p class="navbar-brand" style="margin-bottom:0px"><?php echo $_SESSION['user_name']; ?><?php if ($_SESSION['name']!="") echo " | ".$_SESSION['name']; ?></p>
        	
            <a href="logout.php" class="btn btn-default navbar-btn pull-right">Logout</a>
        	<a href="login.php" class="btn btn-default navbar-btn pull-right" style="margin-right:5px">Back</a>
        </div> 
    </div>
    <div class="container">
        
        
        
        <div class="col-md-12">
                    <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Notification</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover" style="">
                        <thead>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($db_connection,"SELECT * FROM tbl_notification ORDER BY time_stamp DESC");
                            while($row = mysqli_fetch_array($result))
                            {
                            ?>

                            <tr>
                                <td>
                                    <p><?php echo $row['message']; ?></p>
                                    <small><?php echo $row['time_stamp']; ?></small>
                                </td>
                            </tr>     
                            <?php } ?>
                            
                                                                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

	</div>
    <div class="jumbotron" style="padding:5px;margin-bottom:0px;font-size:medium"><small class="pull-right ">Site Created By <a href="#">Mudit Bachhawat</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
    <div class="clearfix"></div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>