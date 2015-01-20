<?php 
		session_start();
		include_once('includes/connectDB.php');
		if (is_logon()==1) header('Location: main_eb.php');
		elseif (is_logon()==3) header('Location: main_dg.php');
		elseif (is_logon()==0) header('Location: login.php');
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
			if (($("#text_area").val()=='')||(text.indexOf("'")>=0)) {alert("Please enter some text or Remove ' from text");return}
			$('#myModal').modal('show');
			$.post("includes/add_message.php",
					{
					message_from:"<?php echo $_SESSION['user_name']; ?>",
					message_to:$("#send_to").val(),
					message:$("#text_area").val()
					},
					function(data,status){
					$('#myModal').modal('hide');
					if (data!=1) alert("Error Occured. Please try again."/*"Data: " + data + "\nStatus: " + status*/);
					$("#text_area").focus();		

					}
				);
			
				
				$("#text_area").val("");
				$("#text_area").focus();		
				
		}
		function approve_message(id,ty)
		{
			$.post("includes/allow_message.php",
					{
					index:id,
					type:ty
					},
					function(data,status){
					if (data!=1) alert("Error Occured. Please try again."/*"Data: " + data + "\nStatus: " + status*/);
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
                      	<h3 style="margin:10px">Sending message for approval.</h3>
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
        	<a href="data_approved.php" class="btn btn-default navbar-btn pull-right" style="margin-right:5px">Approved Data</a>
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
    <div class="jumbotron" style="padding:5px;margin-bottom:0px;font-size:medium"><small class="pull-right ">Site Created By <a href="#">Mudit Bachhawat</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
    <div class="clearfix"></div>
    
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>