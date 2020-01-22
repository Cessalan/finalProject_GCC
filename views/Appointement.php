<?php
    include("../inc/header.php");
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

            <form class="login100-form validate-form" method="GET" action="../controllers/Account_Login.php">
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
                        <input type="text" name="fName" id="fName" value="" placeholder=<?php echo placeholder_fName ?> required/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="lName" id="lName" value="" placeholder=<?php echo placeholder_lName ?> required/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="phone" id="phone" value="" placeholder=<?php echo placeholder_phone ?> required maxlength="9" minlength="9"/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="email" name="email" id="email" value="" placeholder=<?php echo placeholder_email ?> required/>
                    </div>

                    <!-- Break -->
                    <div class="col-12">
                        <select name="demo-category" id="services" >
                            <option selected="selected" class="services"><?php echo SERVICE_QUESTION ?>  </option>
                            <option value="huile"><?php echo SERVICE_HUILE ?></option>
                            <option value="alignment"><?php echo SERVICE_ALIGNMENT ?></option>
                            <option value="injection"><?php echo SERVICE_INJECTION ?></option>
                            <option value="echappment"><?php echo SERVICE_ECHAPPMENT ?></option>
                            <option value="pare-brise"><?php echo SERVICE_PARE_BRISE ?></option>
                            <option value="analyse_moteur"><?php echo SERVICE_ANAYLSE_MOTEUR ?></option>
                            <option value="freins"><?php echo SERVICE_FREINS ?></option>
                        </select>
                    </div>

                    <div class="col-4">
                        <label><?php echo DATE ?></label>

                    </div>
                    <div class="col-8">
                    <input type="date" id="appointment_date"  name="appointment_date" required>
                    </div>

                    <div class="col-8">
                        <label><?php echo available_hours ?></label>
                    </div>
                    <div class="col-4">
                        <select name ="hours">
                            <option></option>
                        </select>
                    </div>
                    <!-- Break -->
                    <div class="col-4 col-12-small">
                        <label><?php echo CONTACT_LABEL?></label>
                    </div>


                    <div class="col-2 col-12-small">
                        <input type="radio" id="demo-radio-alpha" name="demo-radio" checked>
                        <label for="demo-radio-alpha"><?php echo placeholder_phone?></label>
                    </div>
                    <div class="col-2 col-12-small">
                        <input type="radio" id="demo-radio-beta" name="demo-radio">
                        <label for="demo-radio-beta"><?php echo placeholder_email?></label>
                    </div>



                    <!-- Break -->
                    <div class="col-12">
                        <textarea name="message" id="message" placeholder="<?php echo MORE_DETAILS ?>" rows="6"></textarea>
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