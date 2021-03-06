<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-29
 * Time: 11:01 PM
 */
include('../DB/DBManager.php');




?>

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


<div class="container-login100">
    <div class="">
        <div class="login100-pic js-tilt" data-tilt>
            <br><br><br>


        </div>
        <span class="login100-form-title">
                        Liste de rendez- vous pour
					</span>
        <div>

            <form method="get" action="../controllers/AppointmentReportController.php">
                <select name="choice">
                    <!--STICKY SELECT!-->
                    <option value="today" <?php if(isset($_SESSION['choice'])&&$_SESSION['choice']=="today"){echo "selected";}?> >Voir les rendez-vous d'aujourd'hui</option>
                    <option value="tomorrow" <?php if(isset($_SESSION['choice'])&&$_SESSION['choice']=="tomorrow"){echo "selected";}?>>Voir les rendez-vous de demain</option>
                    <option value="cancelled" <?php if(isset($_SESSION['choice'])&&$_SESSION['choice']=="cancelled"){echo "selected";}?>>Voir les rendez-vous annuller</option>
                    <option value="week" <?php if(isset($_SESSION['choice'])&&$_SESSION['choice']=="week"){echo "selected";}?>>Voir les rendez vous de cette semaine </option>
                    <option value="all" <?php if(isset($_SESSION['choice'])&&$_SESSION['choice']=="all"){echo "selected";}?>>Voir tous les rendez-vous</option>
                </select>
                <a href="../views/Report.php"><input type="button" value="🢀 Retour"  /></a>
                <input type="submit" value="Voir">

            </form>

            <?php
            if(isset($_SESSION['appointment_report']) &&!empty($_SESSION['appointment_report'])){
                echo $_SESSION['appointment_report'];
            }else{
                echo "Aucun resultat disponible";
            }

            ?>
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