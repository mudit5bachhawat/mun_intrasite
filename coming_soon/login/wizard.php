<?
	session_start();
	if (!isset($_SESSION['email'])) header("Location: index.php");
	$citys=array("Mumbai"=>"hardik","Pune"=>"hardik","Vijayawada"=>"hardik","Guntur"=>"hardik","Hyderabad"=>"hardik","Indore"=>"hardik","Ranchi"=>"hardik","Ahmedabad"=>"hardik","Kolkata"=>"shovan","Bhubaneshwar"=>"shovan","Dehradun"=>"shovan","Vizag"=>"shovan","Chennai"=>"shovan","Bhopal"=>"shovan","Gwalior"=>"shovan","Chandigarh"=>"shovan","Jamshedpur"=>"akash","Delhi"=>"akash","Udaipur"=>"akash","Jaipur"=>"akash","Raipur"=>"akash","Noida"=>"akash","Kanpur"=>"akash","Nagpur"=>"akash","Patna"=>"akash");

	if ($_SESSION["stage"]=="1") $letter="disabled"; else $letter="";
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 lt-ie10"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 lt-ie10"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    
<!-- Mirrored from proton.orangehilldev.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Oct 2014 01:55:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>GES Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <base href="../"></base>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <style type="text/css">
        .container{
        	padding: 9px 14px;
			margin-bottom: 14px;
			background-color: #f7f7f9;
			border: 1px solid #e1e1e8;
			border-radius: 4px;
        }
        .underline{
        	padding: 0px 15px;
			border-bottom: 2px solid rgb(212, 212, 212);
        }
        .col-md-4 {
		width: 33.2%;
		}
		.error{
			color: #F04124;
		}
		.vr{
		    border-right: 1px solid #A3A3A3;
			border-right: 1px solid rgb(165, 165, 165);
		}
		.radio, .checkbox {
		position: relative;
		display: block;
		margin-top: 10px!important;
		margin-bottom: 10px;
		}
        </style>
        <!-- Common Scripts: -->
        <script>
        (function () {
          var js;
          if (typeof JSON !== 'undefined' && 'querySelector' in document && 'addEventListener' in window) {
            js = '//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js';
          } else {
            js = '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js';
          }
          document.write('<script src="' + js + '"><\/script>');
        }());
        </script>
    </head>

    <body class="login-page">
        
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <img src="favicon.ico" style="float: left;margin-top: 5px;margin-right: 5px;">
	      <a class="navbar-brand" href="#">Global Entrepreneurship Summit</a>
	    </div>
		<ul class="nav navbar-nav navbar-right">
			<li><a onclick="javascript:$('#myModal2').modal('show')">Process of Registration</a></li>
			<li><a href="login/logout.php">Logout</a></li>
		</ul>
	  </div><!-- /.container-fluid -->
	</nav>
		<div class="container">

			<div class="panel panel-default tabpanel">
			  <div class="panel-heading">
				  <ul class="nav nav-pills" role="tablist">
				    <li role="presentation" class="active col-md-4 text-center"><a href="#form" aria-controls="form" role="tab" data-toggle="tab"><b>1. Fill Form</b></a></li>
				    <li role="presentation" class="col-md-4 text-center"><a href="#payment" aria-controls="payment" role="tab" data-toggle="tab"><b>2. Proceed to payment</b></a></li>
				    <li role="presentation" class=" col-md-4 text-center"><a href="#events" aria-controls="events" role="tab" data-toggle="tab"><b>3. Select Events</b></a></li>
				  </ul>
			  </div>
			  <div class="panel-body">
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="form">
		    			<form id="formMain">
		    				<marquee class="h4">Note: Fields under "Letter of Declaration" are one time updatable but fields under "Travel and Accomodation Details" can be updated later.</marquee>
					    	<div class="col-md-6 vr" style="style=border-right: 1px solid rgb(165, 165, 165);">
					    		<h3 class="text-center"><span class="underline">Letter of Declaration</span></h3>
					    		<br>
					    		<div>
							        <div class="form-group">
							        	<label class="control-label" for="higher" style="">Name of Dean /Director/Higher Authority<span class="text-danger">*</span></label>
							      		<input class="form-control" type="text" id="higher" minlength="3" placeholder="Name" name="higher" required <?= $letter ?>>   
							        </div>
							        <div class="form-group">
							        	<label class="control-label" for="contact_higher" style="">Contact Details of Dean /Director/Higher Authority<span class="text-danger">*</span></label>
							      		<input class="form-control" type="text" id="contact_higher" minlength="3" placeholder="Enter Email and contact number" name="contact_higher" required <?= $letter ?>>   
							        </div>
							        <div class="form-group">
							        	<label class="control-label" for="incharge" style="">Name of Professor in charge(E-cell) / Related to Entrepreneurship<span class="text-danger">*</span></label>
							      		<input class="form-control" type="text" id="incharge" minlength="3" placeholder="Name" name="incharge" required <?= $letter ?>>   
							        </div>
							        <div class="form-group">
							        	<label class="control-label" for="contact_incharge" style="">Contact Details of Professor in charge(E-cell) / Related to Entrepreneurship<span class="text-danger">*</span></label>
							      		<input class="form-control" type="text" id="contact_incharge" minlength="3" placeholder="Enter Email and contact number" name="contact_incharge" required <?= $letter ?>>   
							        </div>
							        <div class="form-group">
							        	<label class="control-label" for="letter" style="">Upload your Letter of Declaration here<span class="text-danger">*</span></label>
							      		<input class="form-control" type="file" id="letter" name="letter" accept="image/*,application/pdf" required <?= $letter ?>>   
							        </div>
							        <hr>
					    		</div>
				    		</div>
					    	<div class="col-md-6">
					    		<h3 class="text-center"><span class="underline">Travel and Accomodation Details</span></h3>
					    		<div>
					    			<br>
							        <div class="form-group">
							        	<label class="control-label" for="arrival_date" style="">Arrival Date and Time<span class="text-danger"></span></label>
							      		<input class="form-control" type="datetime-local" id="arrival_date" placeholder="Name" name="arrival_date" >   
							        </div>
							        <div class="form-group">
							        	<label class="control-label" for="dep_date" style="">Departure Date and Time<span class="text-danger"></span></label>
							      		<input class="form-control" type="datetime-local" id="dep_date" name="dep_date" >   
							        </div>
							        <div class="form-group">
							        	<label class="control-label" for="ticket_number" style="">Enter your mode of transportation and ticket number<span class="text-danger"></span></label>
							      		<input class="form-control" type="text" id="ticket_number" name="ticket_number" placeholder="PNR Number, Airline ticket number,etc">   
							        </div>
							        <!--div class="form-group">
							        	<label class="control-label" for="acco" style="">Do you need accomodation?<span class="text-danger"></span></label>
							      		<select class="form-control" type="option" id="acco" name="acco" >
							      			<option>Yes</option>
							      			<option>No</option>
						      			</select>
							        </div-->
							        <div class="form-group">
							        	<label class="control-label" for="tshirt" style="">Tshirt Size<span class="text-danger"></span></label>
							      		<select class="form-control" type="option" id="tshirt" name="tshirt" >
							      			<option>S</option>
							      			<option>M</option>
							      			<option>L</option>
							      			<option>XL</option>
							      			<option>XXL</option>
						      			</select>
							        </div>
							        <hr>


					    		</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-md-12">
					    			<button class="btn btn-primary pull-right" id="update">Update</button>
				    			</div>
				    		</div>
		    			</form>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="payment">
			    		<div class="col-md-10 col-md-offset-1">
			    			<div class>
			    				<h4 class="underline">Payment Details:</h4> 
			    				<div class="row">
			    					<div class="col-md-4">
			    						<p>Name of the Beneficiary</p>
		    						</div>
			    					<div class="col-md-8">
			    						<p><b>ECELL IIT KHARAGPUR</b></p>
		    						</div>
			    				</div>

			    				<div class="row">
			    					<div class="col-md-4">
			    						<p>Address of Beneficiary</p>
		    						</div>
			    					<div class="col-md-8">
			    						<p><b>Entrepreneurship Cell, IIT Kharagpur, Kharagpur – 721302, West Bengal</b></p>
		    						</div>
			    				</div>
			    				<div class="row">
			    					<div class="col-md-4">
			    						<p>Name of the bank</p>
		    						</div>
			    					<div class="col-md-8">
			    						<p><b>IDBI Bank</b></p>
		    						</div>
			    				</div>
			    				<div class="row">
			    					<div class="col-md-4">
			    						<p>Address of the bank</p>
		    						</div>
			    					<div class="col-md-8">
			    						<p><b>Mallancha Rd, Near UTI PO, Nimpura Town, Kharagpur, WB – 721304</b></p>
		    						</div>
			    				</div>
			    				<div class="row">
			    					<div class="col-md-4">
			    						<p>Bank's IFSC/NEFT Code</p>
		    						</div>
			    					<div class="col-md-8">
			    						<p><b>IBKL0000239</b></p>
		    						</div>
			    				</div>
			    				<div class="row">
			    					<div class="col-md-4">
			    						<p>Account No</p>
		    						</div>
			    					<div class="col-md-8">
			    						<p><b>0239104000123952</b></p>
		    						</div>
			    				</div>
			    				<hr>
			    			</div>
		    				<h4 class="underline">Select method of payment:</h4> 
		    				<div class="row">
								<div class="radio col-md-4">
								  <label>
								    <input type="radio"  id="oTransfer" name="method" value="Online Transfer">
								    Online Transfer
								  </label>
								</div>
								<div class="radio col-md-4">
								  <label>
								    <input type="radio"  id="draft" name="method" value="Draft">
								    Draft
								  </label>
								</div>
								<div class="radio col-md-4">
								  <label>
								    <input type="radio"  id="bTransfer" name="method" value="Bank Transfer">
								    Bank Transfer
								  </label>
								</div>
							</div>
							
							<div class="row" id="payment_content">
							<form id="form_payment" class="col-md-12" style="display:none;">
						        <div class="form-group">
						        	<label class="control-label" for="ref" style="">Transaction ID</label>
						      		<input class="form-control" type="text" id="ref" minlength="3" placeholder="Reciept Number" name="ref" required >   
						        </div>
						        <div class="form-group">
						        	<label class="control-label" for="reciept" style="">Upload <span class="text-danger">*</span></label>
						      		<input class="form-control" type="file" id="reciept" name="reciept" accept="image/*" required >   
						        </div>
						        <button id="payment_submit" class="btn btn-primary" type="submit">Submit</button>
							</form>

							</div>
			    		</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="events">
				    	<h4>This portion will be updated soon once your payment is verified</h4>
				    </div>
				  </div>

			  </div>
			  <div class="panel-footer">
    				<p id="contact-details"></p>
			  </div>

			</div>
		
		</div>

				<div id="myModal2" class="modal fade">
				  <div class="modal-dialog modal-lg">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        <h4 class="modal-title">Process for Registration</h4>
				      </div>
				      <div class="modal-body">
					        <ol>
					        	<li>Initiate the process of registration by filling you personal details at: http://www.ges.ecell-iitkgp.org/register</li>
					        	<li>In case your college is not on the list, then request an invite.</li>
					        	<li>As soon as your data has been updated,you will get a link via email to verify.</li>
					        	<li>Login to http://www.ges.ecell-iitkgp.org/login , then enter the details of the professor and upload the letter of recommendation, which will be verified by the Public Relations Team. This can only be done once and your entries will be locked thereafter. </li>
					        	<li>Following this, enter the details of your arrival and departure in the adjacent window, PNR and size of T-Shirt.</li>
					        	<li>6.	All these details can be edited upon logging into your account.</li>
					        	<li>After verification, you can avail one of the three methods of payment : </li>
					        	<li>a. Online Transfer : Can be done in two ways, either by making an NEFT or filling an NEFT form at a bank near you.<br>
									b. Bank Transfer : Via any IDBI bank branch. Further details are provided on the site.<br>
									c. Draft : A draft can be made and sent via courier.<br>
								</li>
					        	<li>A screenshot and photocopy of the form has to preserved for uploading on the registration link and reproduction at GES.</li>
					        	<li>Once payment is verified, you will receive an email providing you with your GES ID. Then, proceed to select your events of interest in the next window (which will be updated in the first fortnight of January).</li>
					        </ol>
				        <br><br>
				        <h4>Pricing</h4>
					      <table class="table table-striped">
					      	<thead><th></th><th>Early Bird(Registration before 31st December)</th><th>Registration in first week of January</th></thead>
					      	<tr><td>Students</td><td>INR 1200/-</td><td>INR 1400/-</td></tr>
					      	<tr><td>Startups</td><td>INR 2000/- for Team Representative and INR 1200/- for other team members/-</td><td>INR 2500/- for Team Representative and INR 1500/- for other team members</td></tr>
					      	<tr><td>Professors</td><td>INR 1800/-</td><td>INR 2000/-</td></tr>
					      	<tr><td>Empresario Semi-Finalists</td><td>INR 1500/-</td><td>INR 1500/-</td></tr>
					      </table>

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->


        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

        <script type="text/javascript">
        var d;
        var cities=JSON.parse('{"Mumbai":"Hardik Katyarmal | hardik.k@ecell-iitkgp.org","Pune":"Hardik Katyarmal | hardik.k@ecell-iitkgp.org","Vijayawada":"Hardik Katyarmal | hardik.k@ecell-iitkgp.org","Guntur":"Hardik Katyarmal | hardik.k@ecell-iitkgp.org","Hyderabad":"Hardik Katyarmal | hardik.k@ecell-iitkgp.org","Indore":"Hardik Katyarmal | hardik.k@ecell-iitkgp.org","Ranchi":"Hardik Katyarmal | hardik.k@ecell-iitkgp.org","Ahmedabad":"Hardik Katyarmal | hardik.k@ecell-iitkgp.org","Kolkata":"Shovan Panigrahi | shovan@ecell-iitkgp.org","Bhubaneshwar":"Shovan Panigrahi | shovan@ecell-iitkgp.org","Dehradun":"Shovan Panigrahi | shovan@ecell-iitkgp.org","Vizag":"Shovan Panigrahi | shovan@ecell-iitkgp.org","Chennai":"Shovan Panigrahi | shovan@ecell-iitkgp.org","Bhopal":"Shovan Panigrahi | shovan@ecell-iitkgp.org","Gwalior":"Shovan Panigrahi | shovan@ecell-iitkgp.org","Chandigarh":"Shovan Panigrahi | shovan@ecell-iitkgp.org","Jamshedpur":"Akash Rathi | akashrathi@ecell-iitkgp.org","Delhi":"Akash Rathi | akashrathi@ecell-iitkgp.org","Udaipur":"Akash Rathi | akashrathi@ecell-iitkgp.org","Jaipur":"Akash Rathi | akashrathi@ecell-iitkgp.org","Raipur":"Akash Rathi | akashrathi@ecell-iitkgp.org","Noida":"Akash Rathi | akashrathi@ecell-iitkgp.org","Kanpur":"Akash Rathi | akashrathi@ecell-iitkgp.org","Nagpur":"Akash Rathi | akashrathi@ecell-iitkgp.org","Patna":"Akash Rathi | akashrathi@ecell-iitkgp.org"}');
			$(document).ready(function(){

				jQuery.validator.setDefaults({
				  debug: true,
				  success: "valid"
				});


			    $.ajax({
			        url: "login/data.php",
			        type: 'GET',
			        async: true,
			        success: function (data) {
			        	d=JSON.parse(data);
				   		$("#higher").val(d["c1"]);
				   		$("#contact_higher").val(d["n1"]);
				   		$("#incharge").val(d["n2"]);
				   		$("#contact_incharge").val(d["c2"]);
				   		$("#arrival_date").val(d["arr_timestamp"].replace(" ","T"));
				   		$("#dep_date").val(d["dep_timestamp"].replace(" ","T"));
				   		$("#ticket_number").val(d["ticket"]);
				   		$("#ref").val(d["payment_reciept"]);
				   		
				   		$("[value='"+d['payment_type']+"']").prop('checked', true);
				   		$("[value='"+d['payment_type']+"']").trigger("change");
						/*$("#acco").children().filter(function() {
						  return $(this).text() == d["acco"];
						}).prop('selected', true);
*/
						$("#tshirt").children().filter(function() {
						  return $(this).text() == d["tshirt"];
						}).prop('selected', true);
						$("#contact-details").html('For queries contact: '+cities[d["city"]]+'</a>');
						if (d["document_verify"]=="") $("#payment").html("<h4>This portion will be updated soon once your letter is verified</h4>")
						if (d["payment_verified"]!="") $("#events").html("<h4>Your Payment has been confirmed.The events will updated shortly.</h4>");
			        },
			        error: function (data) {
			        	alert("Error: "+data);
			        },
			        cache: false,
			        contentType: false,
			        processData: false
			    });

				formMain=$("#formMain");
				formMain.validate();
				$("#form_payment").validate();
				$( "#update" ).click(function() {
				   if (formMain.valid()==true) {
				   		$(this).attr("disabled",true);
				   		c1=$("#higher").val();
				   		n1=$("#contact_higher").val();
				   		n2=$("#incharge").val();
				   		c2=$("#contact_incharge").val();
				   		arr_timestamp=$("#arrival_date").val();
				   		dep_timestamp=$("#dep_date").val();
				   		ticket=$("#ticket_number").val();
				   		/*acco=$("#acco").val();*/
				   		tshirt=$("#tshirt").val();

						var formData=new FormData();
						letter=document.getElementById("letter").files[0];
						
						formData.append("n1",n1);
						formData.append("c1",c1);
						formData.append("n2",n2);
						formData.append("c2",c2);
						formData.append("arr_timestamp",arr_timestamp);
						formData.append("dep_timestamp",dep_timestamp);
						formData.append("ticket",ticket);
						/*formData.append("acco",acco);*/
						formData.append("tshirt",tshirt);
						formData.append("letter",letter);

						$("#update").attr("disabled","disabled");
						$("#update").html("<span class='glyphicon glyphicon-refresh'></span> Uploading your data...");


					    $.ajax({
					        url: "login/update.php",
					        type: 'POST',
					        data: formData,
					        async: true,
					        success: function (data) {
					        	if (data.trim()=="1") window.location.reload();
					        },
					        error: function (data) {
					        	alert("Error: "+data);
					        },
					        cache: false,
					        contentType: false,
					        processData: false
					    });

				   }
				});	

				$( "#payment_submit" ).click(function() {
				   if ($("#form_payment").valid()==true) {
				   		$(this).attr("disabled",true);
				   		ref=$("#ref").val();

						var formData1=new FormData();
						reciept=document.getElementById("reciept").files[0];
						
						formData1.append("ref",ref);
						formData1.append("type",$("[name='method']:checked").val());
						formData1.append("reciept",reciept);

						$("#payment_submit").attr("disabled","disabled");
						$("#payment_submit").html("<span class='glyphicon glyphicon-refresh'></span> Uploading your data...");


					    $.ajax({
					        url: "login/payment.php",
					        type: 'POST',
					        data: formData1,
					        async: true,
					        success: function (data) {
					        	if (data.trim()=="1") {
					        		alert("Response submitted");
					        		window.location.reload();
								}
					        },
					        error: function (data) {
					        	alert("Error: "+data);
					        },
					        cache: false,
					        contentType: false,
					        processData: false
					    });

				   }

				});	





			});

			$("#oTransfer").change(function(e) {
			    $("#form_payment").css("display","");
			    $("#ref").siblings("label").html("Transaction ID");
			    $("#payment_file").siblings("label").html("Upload screenshot of confirmed payment/Reciept of payment");
			});

			$("#draft").change(function(e) {
			    $("#form_payment").css("display","");
			    $("#ref").siblings("label").html("Draft Number");
			    $("#payment_file").siblings("label").html("Upload scanned copy of your draft.");
			});

			$("#bTransfer").change(function(e) {
			    $("#form_payment").css("display","");
			    $("#ref").siblings("label").html("Reciept Number");
			    $("#payment_file").siblings("label").html("Upload sacnned copy of your reciept.");
			});

			$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				console.log(e);
			  if (e.target.hash=="#payment") $("#contact-details").html('For queries contact: Anush Gupta | <a href="mailto:anush.gupta@ecell-iitkgp.org">anush.gupta@ecell-iitkgp.org</a>'); // newly activated tab
			  else if (e.target.hash=="#form") $("#contact-details").html('For queries contact: '+cities[d["city"]]+'</a>');
			  else if (e.target.hash=="#events") $("#contact-details").html('For queries contact: Abhishek Agrawal | <a href="mailto:abhishek.agrawal@ecell-iitkgp.org">abhishek.agrawal@ecell-iitkgp.org</a>');
			})
        </script>

    </body>
</html>