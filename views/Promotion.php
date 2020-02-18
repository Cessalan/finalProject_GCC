<link rel="stylesheet" type="text/css" href="../assets/login/css/util.css">
<link rel="stylesheet" type="text/css" href="../assets/login/css/main.css">
<?php
include("../inc/header.php");
include_once ("../DB/DBManager.php");
?>


                <img id="promotionLogo" src="../assets/pictures/GCCMEC.png" alt="member icon" height="100px" style= "margin-left: 500px" >
                <p>
                </p>
            </div>
					</span>
                <span class="login100-form-title">
                        Bienvenue au page de Promotion
                    <br>

					</span>
<br>
<?php
if(!isset($_SESSION['currentAccount']) || $_SESSION['currentAccount']!="fatsy") {


    ?>

    <?php }

    else{
if (isset($_GET['m'])) {
    echo '<script language="javascript">';
    echo 'alert("' . $_GET['m'] . '")';
    echo '</script>';
}
    ?>
    <h3> Send a mail to the Subscribers</h3>
    <form action="../controllers/SubscriptionController.php" method="get" enctype="multipart/form-data">

        <div class="wrap-input100 validate-input">
            <label>Sujet:</label>
            <input class="input100" type="text" name="subject" required>
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input">
            <label>Message:</label>
            <textarea rows="4" cols="50" class="input100" type="text" name="message" required></textarea>
            <span class="focus-input100"></span>
        </div>

        <a href="../views/Admin.php"><input type="button" value="🢀"/></a>
        <input type="submit" value="Send Promotion" name="submit">
    </form>

    <br>
    <h3> Insert an Image into the Database</h3>
    <form action="../controllers/upload.php" method="post" enctype="multipart/form-data">
        Name:<input type="text" name="name" style="width: 350px" required>
        <br>
        Select image to upload:
        <input type="file" id="fileToUpload" name="fileToUpload" accept=".jpg, .jpeg, .png">
        <input type="submit" name="submit" value="Upload The Image">
    </form>
    <br>

    <form action="Promotion.php" method="post">
        <h3> Select a Promotion image</h3>
        <?php echo getImage(); ?>
        <br>
        <input type="submit" value="Show a Promotion Picture">
        <br>

    </form>
    <?php
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



