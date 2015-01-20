<?php
    session_start();
    $invalid=false;
    if (isset($_SESSION['email'])) header("Location: wizard.php");

    include '../inc/db_connect.php';    
    
    if (isset($_POST['email']))
    {
        
        $email=mysqli_real_escape_string($db_connection,$_POST['email']);
        $pwd=mysqli_real_escape_string($db_connection,$_POST['password']);
        $pwd=md5($pwd);
        $query="SELECT * FROM ".TBL_NAME." WHERE email='$email' AND password='$pwd' AND capcha='-1'";
        $result=mysqli_query($db_connection,$query);

        if (!$result) {
            die(mysqli_error($db_connection));
        }

        if (mysqli_num_rows($result)==1) 
        {
            $row = mysqli_fetch_array($result);
            $_SESSION['id']=$row['id'];
            $_SESSION['name']=$row['name'];
            $_SESSION['stage']=$row['stage'];
            $_SESSION['email']=$email;

            header("Location: wizard.php");
        }
        else
        {
            if (mysqli_num_rows(mysqli_query($db_connection,"SELECT * FROM ".TBL_NAME." WHERE email='$email' AND password='$pwd'"))==1) $email=true;
            else $invalid=true;
        }
    }
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
        

        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <form  role="form" method="post">

            <section class="container col-md-4 col-xs-offset-4" style="margin-top: 100px;">
                <section class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-center">
                            <img src="assets/img/gesLogoBlack.png" alt="GES_LOGO" style="width: 50%;">
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="welcome-text">
                                Welcome,Login with your account, <a href="../register/"><b>Not registered yet!</b></a>
                            </span>

                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control input" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control input" id="password" name="password" placeholder="Password">
                            </div>
                            <?php if ($invalid==true) { ?><h4 class="text-danger text-center">Invalid email or password</h4><?php }; ?>
                            <?php if ($email==true) { ?><h4 class="text-danger text-center">Please confirm your email before login</h4><?php }; ?>
                        </li>

                    </ul>
                    <div class="panel-footer text-center">
                        <button class="btn btn-success" href="">LOGIN TO YOUR ACCOUNT</button>
                        <br>
                    </div>
                </section>
            </section>
        </form>
    </body>

</html>
