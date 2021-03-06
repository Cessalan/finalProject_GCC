<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include('../inc/head.php');
    include ('../DB/DBManager.php')
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


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <br><br><br>
                <img src="../assets/pictures/GCCMEC.png" alt="member icon" height="100px" >
                <p><?php if(isset($_GET['error']))echo "<h5 style='color:red'>".$_GET['error']."</h5>";?></p>
            </div>

            <?php
            $accountInfo=getAccountInfos($_SESSION["currentAccount"]);
//            echo $_SESSION["currentAccount"];
            ////            var_dump($accountInfo);
            ?>

            <form class="login100-form validate-form" method="GET" action="../controllers/Account_SetUp.php">
					<span class="login100-form-title">
                        Bienvenue

					</span>
                <span class="login100-form-title">
                        Informations:
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <label>Prénom</label>
                    <input class="input100" type="text" name="fname" placeholder="John" value="<?php echo $accountInfo['fname']?>" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <label> Nom </label>
                    <input class="input100" type="text" name="lname" placeholder="Smith" value="<?php echo $accountInfo['lname']?>" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <label>Numéro de télephone</label>
                    <input class="input100" type="text" name="telephone" placeholder="514-788-9999" value="<?php echo $accountInfo['phone_number']?>" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <lable>addresse</lable>
                    <input class="input100" type="text" name="address" placeholder="930 Boulevard Roland-Therrien" value="<?php echo $accountInfo['address']?>" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <label>Code Postal</label>
                    <input class="input100" type="text" name="zip" placeholder="J4L2T6" value="<?php echo $accountInfo['zip']?>" required>
                    <span class="focus-input100"></span>
                </div>

                <input type="submit" value="Enregistrer" class="primary" /><br><br>
                <a href="../views/Availability.php"><input type="button" value="🢀" class="primary" /></a>

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


