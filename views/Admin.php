<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
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
    session_start();
    include("../inc/header.php");
    if(!isset($_SESSION['currentAccount'])|| $_SESSION['currentAccount']!="fatsy"){
        header("location:../views/Login.php");
    }
    ?>

</header>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

					</span>
                <span class="login100-form-title">
                        Bienvenue au page d'Administration
					</span>
            <br>
            <div class="col-12 col-12-medium">

                <!-- Buttons -->
                <ul class="actions">
                    <li>  <a href="../views/Promotion.php"> <input type="Button" value="Promotion 📣" class="primary"/></a></li>
                    <li> <a href="../views/Report.php"> <input type="Button" value="Raports 📄" class="primary"/></a></li>
                    <li> <a href="../views/EmployeeSchedule.php"> <input type="Button" value="Horaire 🕓" class="primary"  onclick=""/></a></li>

                </ul>
                <ul class="actions">

                    <li> <a href="../views/CreateAccount.php"> <input type="Button" value="Ajouter un employer 🙍" class="primary"/></a></li>
                    <li> <a href="../views/ResetAccount.php"> <input type="Button" value="Reinitialiser mot de passe &#128272;" class="primary"/></a></li>
                    <li><a href="https://dashboard.stripe.com/test/dashboard"> <input type="Button" value="Paiments/Stripe 💲" class="primary"/></a></li>
                </ul>

            </div>






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
    include(PREAMBLE . 'inc/scripts.php');
    ?>
</div>

</html>

