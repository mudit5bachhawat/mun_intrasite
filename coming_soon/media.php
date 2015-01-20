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
    		<img  src="assets/img/gesLogoBlack.png" class="img-remediaive" style="height:100px!important;margin:0px auto">
    	</div>


<div class="compressed">
  
  <div class="row team-container text-center">
    <b>
            <div class="col-md-offset-4 col-md-2 col-sm-2">
                
                <h5 class="text-center">For Media related queries:</h5>
                <p></p>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <h5>Srivardhan Reddy</h5>
                <p class="label label-info">srivardhan@ecell-iitkgp.org</p>
                <p> &nbsp;+91 91 26 14 5572&nbsp; </p>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <h5></h5>
                <p class="label label-info"></p>
                <p></p>
            </div>
      </b>
  </div>
</div>


    	
    	<h3 class="text-center"><b>Media Partners</b></h3>

<?php
    $sql = "SELECT * FROM `cmr_mediatype` ORDER BY priority";

	if (!($result=mysqli_query($db_connection,$sql))) {
		die("0");
	}
	else{
		while ($mediaType = mysqli_fetch_array($result)) {
			$sql1 = "SELECT * FROM `cmr_mediadetail` WHERE mediaType_id=".$mediaType["id"]." ORDER BY priority";
			?>
				<div class="col-md-<?php echo($mediaType["width"]); ?>">
				<h4 class="back-color text-center"><?= $mediaType["media_type"] ?></h4>
					<div class="row" style="margin-bottom:<?php echo($mediaType["margin_bottom"]); ?>px">
				<?php

				if (!($result1=mysqli_query($db_connection,$sql1))) {
					die("0");
				}
				else{
					while ($mediaDetail = mysqli_fetch_array($result1)) {
						?>
		

						<div class="col-md-<?php echo($mediaType["width_per_media"]); ?>">
							<a target="_blank" href="<?= $mediaDetail["url"] ?>"><img style="margin-top:<?= $mediaDetail["margin_top"] ?>px;margin-bottom:<?= $mediaDetail["margin_bottom"] ?>px;margin-left:auto;margin-right:auto;width:<?= $mediaDetail["style_width"] ?>" class="img-responsive" src="//admin.ecell-iitkgp.org/media/<?= $mediaDetail["image"]; ?>"/></a>
							<h5 class="text-center b"><b><?= $mediaDetail["mediaTitle"] ?></b></h5>
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