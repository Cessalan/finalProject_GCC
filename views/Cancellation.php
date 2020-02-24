<?php
    include("../inc/header.php");
include('../DB/DBManager.php');
$conn = connection();
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
            <div class="login100-pic js-tilt" data-tilt>
                <br><br><br>
                <img id="imgPosition" src="../assets/pictures/GCCMEC.png" alt="member icon" height="100px" >
            </div>

            <form class="login100-form validate-form" method="POST" action="../controllers/CancellationController.php">
					<span class="login100-form-title">
                        <?php
                        echo cPolicy
                        
                        ?>
                    </span>
                <div class="row gtr-uniform">
                    <div class="col-12 col-12-xsmall">
                        <?php
                        echo cancel
                        ?>
                        <input type="text" name="confirmation" id="confirmation" placeholder="Confirmation Number"<?php /*echo placeholder_fName */?> required/>
                    </div>
                    <!-- Break -->
                    <div id="act">
                        <ul class="actions" >
                            <li><input type="submit" value="<?php echo submit?>" class="primary" /></li>
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