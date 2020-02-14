<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    define('PREAMBLE', '../');
    include(PREAMBLE . 'inc/head.php');?>
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
    include(PREAMBLE . 'inc/nav-bar.php');?>
    <a class="logo" href="../views/Home.php"> <span>GCC</span></a>
</header>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <br><br><br>
                <img src="../assets/pictures/GCCMEC.png" alt="member icon"  >
                <p> Notez que les jours de travails dépendent du gérant et de la clientèle.
                    Nous ne donnons donc aucune garantie.
                    Merci de votre compréhension.
                </p>
            </div>

            <form class="login100-form validate-form" method="GET" action="../controllers/AvailabilitiesController.php">
					<span class="login100-form-title">
                       Donnez vos disponibiliés

					</span>
                <span class="login100-form-title">
                        Cochez les jour pour lesquels vous desirez travailler:
					</span>

                <div class="col-6 col-12-small">
                    <input type="checkbox"  id="monday" name="days[]" value="lundi">
                    <label for="monday">Lundi</label>
                </div><br>
                <div class="col-6 col-12-small">
                    <input type="checkbox"  id="tuesday" name="days[]" value="mardi">
                    <label for="tuesday">Mardi</label>
                </div><br>
                <div class="col-6 col-12-small">
                    <input type="checkbox"  id="wednesday" name="days[]" value="mercredi">
                    <label for="wednesday">Mercredi</label>
                </div><br>
                <div class="col-6 col-12-small">
                    <input type="checkbox" id="thursday" name="days[]" value="jeudi">
                    <label for="thursday">Jeudi</label>
                </div><br>
                <div class="col-6 col-12-small">
                    <input type="checkbox" id="friday"  name="days[]" value="vendredi">
                    <label for="friday">Vendredi</label>
                </div><br>
                <div class="col-6 col-12-small">
                    <input type="checkbox" id="saturday"  name="days[]" value="samedi">
                    <label for="saturday">Samedi</label>
                </div><br>
                <input type="submit" value="Envoyer" class="primary" onclick="alert('Confrimez les disponibilites')"/><br><br>
                <a href="../views/IndividualSchedule.php"> <input type="Button" value="Voir mon horaire" class="primary"  onclick=""/></a>  <br> <br>
                <a href="../views/SetUpAccount.php"><input type="Button" value="Mettre à jour mon compte" class="primary" /></a><br>
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
    include(PREAMBLE . 'inc/scripts.php');
    ?>
</div>

</html>

