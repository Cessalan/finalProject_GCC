<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    define('PREAMBLE', '../');
    include(PREAMBLE.'inc/head.php');
    session_start();


    if(!isset($_SESSION['currentAccount'])|| $_SESSION['currentAccount']!="fatsy"){
        header("location:../views/Login.php");
    }





    ?>

    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../assets/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/c.ss-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<header id="header">
    <?php
    include(PREAMBLE.'inc/nav-bar.php');?>
</header>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <br><br><br>
                <img src="../assets/pictures/GCCMEC.png" alt="member icon" height="100px" >
                <p><?php if(isset($_GET['error']))echo "<h5 style='color:red'>".$_GET['error']."</h5>";?></p>
            </div>

            <form class="login100-form validate-form" method="GET" action="../controllers/Account_Login.php">
					<span class="login100-form-title">
                       Page de reinitialisation

					</span>


                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="<?php echo placeholder_email?>" required>
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Nouveau Mot De Passe" required>
                    <span class="focus-input100"></span>
                </div>
                <input type="submit" value="<?php echo Connect ?>" class="primary" />
            </form>
        </div>
    </div>
</div>
<div><!--===============================================================================================-->
    <script src="../assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="../assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/login/vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <?php
    include(PREAMBLE.'inc/scripts.php');
    ?>
</div>

</html>

