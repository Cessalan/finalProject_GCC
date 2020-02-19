<?php
    include("../inc/header.php");
include('../DB/DBManager.php');

$conn = connection();
$infoArray = array();
if(isset($_SESSION['infoTime']))
{
    $infoArray = unserialize($_SESSION['infoTime']);
}

    ?>

    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/appoint/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/appoint/main.css">
    <!--===============================================================================================-->
</head>
<body class ="is-preload">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <br><br><br>
                <img id="imgPosition" src="../assets/pictures/GCCMEC.png" alt="member icon" height="100px" >
            </div>

            <form class="login100-form validate-form" method="GET" action="../controllers/AppointmentController.php">
					<span class="login100-form-title">
                        <?php
                        echo APPOINTMENT_TEXT
                        . "<br>"
                        .
                        FORM_TEXT
                        ?>
                    </span>
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="fName" id="fName" value="<?php if(!empty($infoArray)) echo $infoArray['fName'] ?>" placeholder=<?php echo placeholder_fName ?> required/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="lName" id="lName" value="<?php if(!empty($infoArray)) echo $infoArray['lName'] ?>" placeholder=<?php echo placeholder_lName ?> required/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="phone" id="phone" value="<?php if(!empty($infoArray)) echo $infoArray['phone'] ?>" placeholder=<?php echo placeholder_phone ?> required maxlength="10" minlength="10"/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="email" name="email" id="email" value="<?php if(!empty($infoArray)) echo $infoArray['email'] ?>" placeholder=<?php echo placeholder_email ?> required/>
                    </div>

                    <!-- Break -->
                    <div class="col-4">

                        <label><?php echo DATE ?></label>

                    </div>
                    <div class="col-8">
                    <input type="date" id="appointment_date"  name="appointment_date" value="<?php if(!empty($infoArray)) echo $infoArray['dateSelected'] ?>" required>
                    </div>

                    </div>
                    <!-- Break -->
                    <div id="act">
                        <ul class="actions" >
                            <li><input type="submit" name="submit" value="<?php echo submit?>" class="primary" /></li>
                            <li><input type="reset" value="<?php echo reset?>" /></li>
                        </ul>
                    </div>
                </div>
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
            scale: 0.7
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <?php
    include(PREAMBLE.'inc/scripts.php');

    ?>
</div>
</body>