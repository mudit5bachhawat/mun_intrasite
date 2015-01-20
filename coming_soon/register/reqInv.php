<html>
<head>
	<title>Request Invite | GES 2015</title>
	<base href="../"></base>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
	.text-danger{
		color: #f04124!important
	}
	</style>
</head>
<body>
	<br><br>
	<div class="col-md-offset-3 col-md-6"> 
		<img class="pull-right" src="assets/img/gesLogoBlack.png" style="height: 75px;margin-top: 25px;"/>
		<h3>Global Entrepreneurship Summit 2015</h3>
		<h4>Request Invite</h4>
		<div class="clearfix"> </div>
		<hr style="border-top: 2px solid;">
		<p class="help-block">All the fields are mandatory since the Invite will be sent to the highest authority of the college</p>
		<form>
	        <div class="form-group">
	        	<label class="control-label" for="name" style="">Name<span class="text-danger">*</span></label>
	      		<div class="helper-text"></div>
	      		<input class="form-control" type="text" id="name" placeholder="Full Name" >   
	      		<p class="help-block text-danger"></p>
	        </div>
	        <hr>
	        <div class="form-group">
	        	<label class="control-label" style="margin-bottom: 10px;">Gender<span class="text-danger">*</span></label>
	        	<br>
	        	<input id="male" type="radio" name="gender" value="male"/>
	        	<label for="male" class="control-label" style="margin-bottom: 0px;">Male</label><br>
	        	<input id="female" type="radio" name="gender" value="female"/>
	        	<label for="female" class="control-label">Female</label>
	        	<p class="help-block text-danger"></p>
	        </div>
	        <hr>
	        <div class="form-group">
	        	<label class="control-label">City<span class="text-danger">*</span></label>
	        	<br>
	      		<select class="form-control" id="city">
	      			<option>Select a City</option>
	      		</select>
	      		<p class="help-block  text-danger"></p>
	        </div>
	        <div class="form-group">
	        	<label class="control-label">College<span class="text-danger">*</span></label>
	        	<br>
	      		<input class="form-control" type="text" id="college" placeholder="College" >   
	      		<p class="help-block text-danger"></p>
	        </div>
	        <hr>
	        <div class="form-group">
	        	<label class="control-label">Year of Study<span class="text-danger">*</span></label>
	        	<br>
	      		<input class="form-control" type="text" id="year" placeholder="Year of study" >   
	      		<p class="help-block text-danger"></p>
	        </div>
	        <hr>
	        <div class="form-group">
	        	<label class="control-label" for="mobile" style="">Mobile<span class="text-danger">*</span></label>
	      		<div class="helper-text"></div>
	      		<input class="form-control" type="text" id="mobile" placeholder="10 Digits Mobile Number" >   
	      		<p class="help-block text-danger"></p>

	        </div>
	        <hr>
	        <div class="form-group">
	        	<label class="control-label" for="email" style="">Email<span class="text-danger">*</span></label>
	      		<div class="helper-text"></div>
	      		<input class="form-control" type="email" id="email" placeholder="abc@example.com" >   
	      		<p class="help-block text-danger"></p>
	        </div>
	        <hr>
	        <div class="form-group">
	        	<label class="control-label">Contact Details (Dean /Director/Higher Authority)<span class="text-danger">*</span></label>
	        	<br>
	      		<input class="form-control" type="text" id="c1" placeholder="" >   
	      		<p class="help-block text-danger"></p>
	        </div>
	        <hr>
	        <div class="form-group">
	        	<label class="control-label">Contact details ( Professor in charge(E-cell) / Related to Entrepreneurship)<span class="text-danger">*</span></label>
	        	<br>
	      		<input class="form-control" type="text" id="c2" placeholder="" >   
	      		<p class="help-block text-danger"></p>
	        </div>
	        <hr>
	        <button id="submit" class="btn btn-primary">Request Invite</button>
		</form>
	</div>

	<div class="clearfix"></div>
	<hr>
	<p class="text-center">Copyright Entrepreneurship Cell</p>




	<script type="text/javascript" src="assets/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">

		$("#name").focusout(function(){
			if ($("#name").val().trim()=="") {
				$(this).siblings("p").html("Enter name");
			}			
		});
		$("#submit").click(function(e){
			e.preventDefault();
			name=$("#name").val().trim();
			if (name==""){
				$("#name").siblings("p").html("Enter name");
				$(("#name")).focus();
				$("#name").parent().addClass("text-danger");
				return;
			}

			gender=$("[name='gender']:checked").val();
			if (gender==undefined){
				$("[name='gender']").siblings("p").html("Please select gender.");
				$("[name='gender']").focus();
				$("[name='gender']").parent().addClass("text-danger");
				return;
			}


			city=$("#city").val();
			if (city=="Select a City") {
				$("#city").siblings("p").html("Please select a city.");
				$("#city").focus();
				$("#city").parent().addClass("text-danger");
				return;
			}
			
			college=$("#college").val();
			if (college=="") {
				$("#college").siblings("p").html("Please enter college.");
				$("#college").focus();
				$("#college").parent().addClass("text-danger");
				return;
			}
			
			year=$("#year").val().trim();
			if (year==""){
				$("#year").siblings("p").html("Enter year");
				$(("#year")).focus();
				$("#year").parent().addClass("text-danger");
				return;
			}

			/*faculty=$("#faculty").val();
			if (faculty=="") {
				$("#faculty").siblings("p").html("Please select a faculty.");
				$("#faculty").focus();
				$("#faculty").parent().addClass("text-danger");
				return;
			}*/

			mobile=$("#mobile").val();
			if (mobile=="") {
				$("#mobile").siblings("p").html("Please enter mobile number.");
				$("#mobile").focus();
				$("#mobile").parent().addClass("text-danger");
				return;
			}

			email=$("#email").val();
			if (email=="") {
				$("#email").siblings("p").html("Please enter email.");
				$("#email").focus();
				$("#email").parent().addClass("text-danger");
				return;
			}


			c1=$("#c1").val();
			if (c1=="") {
				$("#c1").siblings("p").html("Please fill this field.");
				$("#c1").focus();
				$("#c1").parent().addClass("text-danger");
				return;
			}

			c2=$("#c2").val();
			if (c1=="") {
				$("#c2").siblings("p").html("Please fill this field.");
				$("#c2").focus();
				$("#c2").parent().addClass("text-danger");
				return;
			}


			$(this).attr("disabled","disabled");
			$.post("register/regInv.php",{
				name:name,
				gender:gender,
				city:city,
				college:college,
				year:year,
				mobile:mobile,
				email:email,
				c1:c1,
				c2:c2
			}).success(function(data){
				if (data.trim()=="1") alert("Data recorded");
				$("#submit").removeAttr("disabled");
				window.location.reload();

			}).error(function(data){
				alert("Error: "+data);
			});
		});
		$(document).ready(function(){
			$("#city").load('register/getCities.php');
		});
		$("#city").change(function(){
			$("#college").load('register/getColleges.php?city='+encodeURI($("#city").val()),function(data){
				if (data.trim()=="") {
					$("#college").attr("disabled","disabled");
				}
				else {
					$("#college").removeAttr("disabled");
				}
					//$("#college").trigger("change");
			});
		})
		/*$("#college").change(function(){
			$("#faculty").load('register/getFaculty.php?college='+encodeURI($("#college").val()),function(data){
				if (data.trim()=="") {
					$("#faculty").attr("disabled","disabled");
				}
				else {
					$("#faculty").removeAttr("disabled");
				}
			});
		})*/

	</script>
</body>
</html>