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
                        Voulez prendre une rendez-vous?
                        <br>
                        Remplissez le formulaire ci-dessous
                    </span>
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="demo-firstName" id="fName" value="" placeholder="Prénom" />
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="email" name="demo-lastName" id="lName" value="" placeholder="Nom" />
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="demo-phone" id="phone" value="" placeholder="Téléphone" />
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="demo-email" id="email" value="" placeholder="Courriel" />
                    </div>

                    <!-- Break -->
                    <div class="col-12">
                        <select name="demo-category" id="services" >
                            <option selected="selected" class="services"></option>
                            <option value="">Votre rendez-vous est à quel sujet?  </option>
                            <option value="huile">Service de changement d'huile</option>
                            <option value="penus">Pneus</option>
                            <option value="alignment">Alignement automobile</option>
                            <option value="injection">Injection</option>
                            <option value="echappment">Réparation d'échappement</option>
                            <option value="pare-brise">Remplacement et réparation de pare-brise</option>
                            <option value="analyse_moteur">Analyse moteur et électricité</option>
                            <option value="freins">Freins</option>
                        </select>
                    </div>

                    <div class="col-4">
                        <label>Choisissez votre date</label>

                    </div>
                    <div class="col-8">
                    <input type="date" id="date"  name="bday">
                    </div>
                    <?php

                    ?>
                    <!-- Break -->
                    <div class="col-4 col-12-small">
                        <label>Vous désirez être contacté par:</label>
                    </div>


                    <div class="col-2 col-12-small">
                        <input type="radio" id="demo-radio-alpha" name="demo-radio" checked>
                        <label for="demo-radio-alpha">Téléphone</label>
                    </div>
                    <div class="col-2 col-12-small">
                        <input type="radio" id="demo-radio-beta" name="demo-radio">
                        <label for="demo-radio-beta">Courriel</label>
                    </div>



                    <!-- Break -->
                    <div class="col-12">
                        <textarea name="message" id="message" placeholder="Plus de détails (Optional)" rows="6"></textarea>
                    </div>
                    <!-- Break -->
                    <div id="act">
                        <ul class="actions" >
                            <li><input type="submit" value="Submit Form" class="primary" /></li>
                            <li><input type="reset" value="Reset" /></li>
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