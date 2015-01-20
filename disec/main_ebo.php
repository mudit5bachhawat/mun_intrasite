<?php 
	session_start();
		include_once('includes/connectDB.php');
        include_once('includes/session.php');
		if (is_logon()==2) header('Location: main_ip.php');
		//elseif (is_logon()==3) header('Location: main_dg.php');
		elseif (is_logon()==0) header('Location: login.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>IIT KGP MUN 2014</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/jquery.dataTables.css" rel="stylesheet">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen"><!--Manual Style-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <!--Font-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,800italic,400,600,300,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" charset="utf-8">
		var ajax_working,tbl;
		function load_all()
		{
			ajax_working=true;
			
			$("#tbl_msg").load("includes/chat.php",function(responseTxt,statusTxt,xhr)
				{
				//tbl=$('#messages').filterTable();
				ajax_working=false;
  				});
			ajax_working=true;
			$("#tbl_approval").load("includes/approval.php",function(responseTxt,statusTxt,xhr)
				{
				//tbl=$('#messages').filterTable();
				ajax_working=false;
  				});
		}
		
    	$(document).ready(function() {
			
			
			//tbl=$('#messages').filterTable();	
			
			load_all();
			setInterval(function(){ if (ajax_working==false) load_all();},500);
        });
		
		function sendMsg()
		{
			var text=$("#text_area").val();
			if (($("#text_area").val()=='')||(text.indexOf("'")>=0)) {alert("Please enter sone text or Remove ' from text");return}
			$('#myModal').modal('show');
			$.post("includes/add_message.php",
					{
					message_from:"<?php echo $_SESSION['user_name']; ?>",
					message_to:$("#send_to").val(),
					message:$("#text_area").val()
					},
					function(data,status){
					$('#myModal').modal('hide');
					if (data==0) alert("Data: " + data + "\nStatus: " + status);
					$("#text_area").focus();		

					}
				);
			
				
				$("#text_area").val("");
				$("#text_area").focus();		
				
		}
		function approve_message(id,ty)
		{
			$('#myModal').modal('show');
			$.post("includes/allow_message.php",
					{
					index:id,
					type:ty
					},
					function(data,status){
					$('#myModal').modal('hide');
					if (data==0) alert("Data: " + data + "\nStatus: " + status);
					}
				);
		}
		
    </script>

  </head>
  <body>
  <!--Modal-->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top: 265px;">
                <div class="modal-content">
                      <div class="modal-body panel-body" style="height: 82px;">
                      <div class="col-md-2"><img src="res/ajax_loader.gif" width="50px"></div>
                      <div class="col-md-10">
                      	<h3 style="margin:10px">Sending...</h3>
                      </div>
                      <div class="clearfix"></div>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
  <!--Modal-->
  
  
  	<div>
    	<img src="res/mun-bg.jpg" alt="header" class="center-block container">
        <div class="navbar navbar-default container" style="width: 1113px;background-color: rgb(244, 244, 250);margin-bottom: 5px;margin-top: 5px;">
        	<img class="pull-left" src="res\flags\<?php echo $_SESSION['user_name'] ?>.jpg" height="40" style="margin-top: 5px;">
            <p class="navbar-brand" style="margin-bottom:0px"><?php echo $_SESSION['user_name']; ?><?php if ($_SESSION['name']!="") echo " | ".$_SESSION['name']; ?></p>
        	<a href="logout.php" class="btn btn-default navbar-btn pull-right">Logout</a>
        	<a href="notification.php" class="btn btn-default navbar-btn pull-right" style="margin-right:5px">Notifications</a>
        </div> 
    </div>
    <div class="container">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Messages</h3>
                </div>
                <div class="panel-body">
                        <div class="col-md-12" style="margin-bottom:20px">
                            <div class="col-lg-10">
                            <textarea id="text_area" class="form-control" autofocus rows="3"></textarea>
                            </div>
                            
                            <div class="col-lg-2">
                                <select name="id" id="send_to" class="form-control">
                                    <option>IP1</option>
                                    <option>EB1</option>
                                    <option disabled>----------------</option>
                                    <option>Canada</option>
                                    <option>China</option>
                                    <option>Denmark</option>
                                    <option>Earthfirst!</option>
                                    <option>ExxonM</option>
                                    <option>Finland</option>
                                    <option>Germany</option>
                                    <option>Greenpeace</option>
                                    <option>Iraq</option>
                                    <option>Japan</option>
                                    <option>Nature Conservancy</option>
                                    <option>Norway</option>
                                    <option>NRDC</option>
                                    <option>RD Shell</option>
                                    <option>Russia</option>
                                    <option>S Korea</option>
                                    <option>UK</option>
                                    <option>US</option>
        
        
                                </select>
                                <button class="btn btn-primary btn-block" style="margin-top:5px" onClick="sendMsg();">Send</button>
                            </div>
                        </div>
                        <table id="messages" class="table table-hover col-md-12" style="border:1px solid #D1D1D1;border-radius:2px;">
                            <thead>
                                <tr>
                                    <td class="col-md-1"> 0</td>
                                    <td class="col-md-11">Messages</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_msg">
                    
                                     
                            </tbody>
                        </table>
                
                
                </div>
            </div>
        </div>
        
        
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Approvals</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover" style="border:1px solid #D1D1D1;border-radius:2px">
                        <thead>
                            <tr>
                                <td class="col-md-2"> </td>
                                <td>Messages</td>
                            </tr>
                        </thead>
                        <tbody id="tbl_approval">
                            
                        </tbody>
                    </table>
                
                </div>
            </div>
            
                    <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3> Add Notification</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="includes/add_notification.php">
                        <textarea class="form-control" name="txt_notification" required></textarea>
                        <button class="btn btn-primary btn-lg" type="submit" style="margin:5px" >Add</button>
                    </form>
                </div>
            </div>
        </div>

	</div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>