<?php
include("../inc/header.php");
include('../DB/DBManager.php');

$conn = connection();



?>
<title>Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../assets/appoint/util.css">
<link rel="stylesheet" type="text/css" href="../assets/appoint/main.css">
<!--===============================================================================================-->
</head>
<body class="is-preload">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic">
                <br><br><br>
                <img id="imgPosition" src="../assets/pictures/GCCMEC.png" alt="member icon" height="100px">

            </div>

            <?php
                if (isset($_GET['demo-radio']) && isset($_GET['hours']) && isset($_GET['services'])) {
                    $infoArray = unserialize($_SESSION['info']);


                    $LastName = $infoArray['lName'];
                    $firstName = $infoArray['fName'];
                    $dateSelected = $infoArray['dateSelected'];
                    $phoneSelected = $infoArray['phone'];
                    $emailSelected = $infoArray['email'];

                    $timeSelected = $_GET['hours'];
                    $serviceSelected = $_GET['services'];
                    $radioSelected = $_GET['demo-radio'];
                    $price = 0;
                    $messageSelected = $_GET['message'];

                    foreach ($services as $service) {
                        if (isset($_GET['services']) && $_GET['services'] == $service[0]) {


                            $price = $service[2];
                        }
                    }

                    $TimeInfo = array (
                        "timeSelected"=>$timeSelected,
                        "serviceSelected"=>$serviceSelected,
                        "radioSelected"=>$radioSelected,
                        "price"=>$price);
                    array_push($infoArray,$TimeInfo);
                   // print_r($infoArray);

                    //print_r(array_merge($infoArray,$TimeInfo));
                    $_SESSION['info'] = serialize($infoArray);
                    $timePage = "../views/TimeSelection.php";
                    header("location:".$timePage);
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

    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <?php

    include(PREAMBLE.'inc/scripts.php');


    ?>
</div>
</body>




