<?php
    $db_connection=mysqli_connect("mysql.ges.ecell-iitkgp.org","adminges","master_ges","gesadmin2015");
?>

<!DOCTYPE html>
<html lang="en">

<head>

        <meta charset="utf-8">
        <title>Global Entrepreneruship Summit '15</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


    </head>
<style type="text/css">
.back-color{
  background-color: #C0B7B2;
  line-height: 1.4em;
  font-weight: 500;
  font-size: larger;
}
</style>
    <body>

    	<div id="header" class="row text-center">
    		<img  src="assets/img/gesLogoBlack.png" class="img-responsive" style="height:100px!important;margin:0px auto">
    	</div>
    	
	<div class="compressed">
	  <h5 class="text-center">For Sponsorship related queries:</h5>
	  <div class="row team-container text-center">
	    <b>
	            <div class="col-md-4 col-sm-4 animated-when-visible animated bounceInLeft" data-animation-type="bounceInLeft">
	                <h5>Himanshu Agarwal </h5>
	                <p class="label label-info">himanshu.agarwal@ecell-iitkgp.org</p>
	                <p> &nbsp;+91 94 75 474972&nbsp; </p>
	            </div>
	            <div class="col-md-4 col-sm-4 text-center animated-when-visible animated bounceInUp" data-animation-type="bounceInUp">
	                <h5>Amrut Rajkarne</h5>
	                <p class="label label-info">amrut@ecell-iitkgp.org</p>
	                <p> &nbsp;+91 91 26 14 5572&nbsp; </p>
	            </div>
	            <div class="col-md-4 col-sm-4 text-center animated-when-visible animated bounceInRight" data-animation-type="bounceInRight">
	                <h5>Prashant Kush</h5>
	                <p class="label label-info">prashant.kush@ecell-iitkgp.org</p>
	                <p> &nbsp;+91 90 93 33 7963&nbsp; </p>
	            </div>
	        </b>
	  </div>
	</div>



    	<h3 class="text-center"><b>Sponsors</b></h3>

<?php
    $sql = "SELECT * FROM `cmr_sponstype` ORDER BY priority";

	if (!($result=mysqli_query($db_connection,$sql))) {
		die("0");
	}
	else{
		while ($sponsType = mysqli_fetch_array($result)) {
			$sql1 = "SELECT * FROM `cmr_sponsdetail` WHERE sponsType_id=".$sponsType["id"]." ORDER BY priority";
			?>
				<div class="col-md-<?php echo($sponsType["width"]); ?>">
				<h4 class="back-color text-center"><?= $sponsType["spons_type"] ?></h4>
					<div class="row" style="margin-bottom:<?php echo($sponsType["margin_bottom"]); ?>px">
				<?php

				if (!($result1=mysqli_query($db_connection,$sql1))) {
					die("0");
				}
				else{
					while ($sponsDetail = mysqli_fetch_array($result1)) {
						?>
		

						<div class="col-md-<?php echo($sponsType["width_per_spons"]); ?>">
							<a target="_blank" href="<?= $sponsDetail["url"] ?>"><img style="margin-top:<?= $sponsDetail["margin_top"] ?>px;margin-bottom:<?= $sponsDetail["margin_bottom"] ?>px;margin-left:auto;margin-right:auto;width:<?= $sponsDetail["style_width"] ?>" class="img-responsive" src="//admin.ecell-iitkgp.org/media/<?= $sponsDetail["image"]; ?>"/></a>
							<h5 class="text-center b"><b><?= $sponsDetail["sponsTitle"] ?></b></h5>
						</div>


						<?php

					}
				}
				?>

					</div>
				</div>
			<?php

			}
		} ?>

        <style type="text/css">
		body{
			padding-top: 15px;
		}
        </style>



        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>


</html>