                    <?php 
							session_start();
							include_once('includes/connectDB.php');
							if ((is_logon()==3)||(is_logon()==0)||(is_logon()==1)) die("<h1>You dont have access</h1>");
					?>
<!DOCTYPE html>
<html>
  <head>
    <title>IIT KGP MUN 2015</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen"><!--Manual Style-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.js"></script>
    <!--Font-->


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
						<table class="table table-hover" style="border:1px solid">
							<thead>
								<th class="col-md-2">Time Stamp</th>
								<th>Messages</th>
							</thead>
					<?php
                            $result = mysqli_query($db_connection,"SELECT * FROM tbl_message WHERE verify=1 ORDER BY time_stamp DESC");
                            while($row = mysqli_fetch_array($result))
                                {
                        ?>
							<tr>
                            <td>
								<?php echo($row['time_stamp']); ?>
                            </td>
								
                            <td>
                                <p  style="word-break:break-all;"><?php echo $row['message']; ?></p>
                                <small><?php echo 'Sent from '.$row['message_from'].' to '.$row['message_to']; ?>.</small>
                            </td>
                        </tr>
                        
						<?php
									}
                        ?>   
						<table>
		</div>
        

        
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <div class="jumbotron" style="padding:5px;margin-bottom:0px;font-size:medium"><small class="pull-right ">Site Created By <a href="#">Mudit Bachhawat</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
    <div class="clearfix"></div>
  </body>
</html>