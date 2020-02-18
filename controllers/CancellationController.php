<?php
include("../inc/header.php");
include('../DB/DBManager.php');
?>


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
                <div class="login100-pic">
                    <br><br><br>
                    <img id="imgPosition" src="../assets/pictures/GCCMEC.png" alt="member icon" height="100px" >
                </div>


<?php
if(isset($_POST['confirmation']) ){
if(is_numeric($_POST['confirmation'])){

    $conNum = $_POST['confirmation'];

    $display_block = matchID($conNum);
    $display_block .=
        " </div>
    </div>
</div>
<div><!--===============================================================================================-->
    <script src=\"../assets/login/vendor/jquery/jquery-3.2.1.min.js\"></script>
    <!--===============================================================================================-->
    <script src=\"../assets/login/vendor/bootstrap/js/popper.js\"></script>
    <script src=\"../assets/login/vendor/bootstrap/js/bootstrap.min.js\"></script>
    <!--===============================================================================================-->
    <script src=\"../assets/login/vendor/select2/select2.min.js\"></script>
    <!--===============================================================================================-->
    <script src=\"../assets/login/vendor/tilt/tilt.jquery.min.js\"></script>
    <script >

        $('.js-tilt').tilt({
            scale: 0.7
        })

    </script>
    <!--===============================================================================================-->
    <script src=\"js/main.js\"></script>";
     echo $display_block;
    ?>
</div>

<?php
}else{
    echo "Please enter a valid confirmation number" .
     "<br> <a href='../views/Cancellation.php'>Go back.</a>";
    }
}else{
    echo "Your appointment has been cancelled" . "<br> <a href='../views/Cancellation.php'>Go back.</a>";
    }
include(PREAMBLE.'inc/scripts.php');
?>