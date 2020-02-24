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
                        Bienvenue à la  page de Promotion
                    <br>

					</span>
<br>
<?php
if(!isset($_SESSION['currentAccount']) || $_SESSION['currentAccount']!="fatsy") {
    if(isset($_SESSION['imgSession'])) {
        $imgArray = unserialize($_SESSION['imgSession']);
        $item_image = $imgArray['imgSelected'];
        echo "<img src='../controllers/uploads/$item_image' class='center' alt='picture here'>";
    }
    else{
        echo "<h1>No Promotion Available</h1>";
    }
    }

    else{

    ?>
    <h3> Envoyer un email aux abonné(e)s</h3>
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
        <input type="submit" value="Envoyer le courriel" name="submit">
    </form>

    <br>
    <h3> Inserer une image de promotion dans la base de donnée</h3>
    <form action="../controllers/upload.php" method="post" enctype="multipart/form-data">
        Nom:<input type="text" name="name" style="width: 350px" required>
        <br>
        Image à upload:
        <input type="file" id="fileToUpload" name="fileToUpload" accept=".jpg, .jpeg, .png">
        <input type="submit" name="submit" value="Enregister l'image">
    </form>
    <br>

    <form action="PromotionPage.php" method="post">
        <h3> Selectionner une image pour la promotion</h3>
        <?php echo getImage(); ?>
        <br>
        <input type="submit" value="Montrer l'image">
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



