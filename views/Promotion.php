<link rel="stylesheet" type="text/css" href="../assets/login/css/util.css">
<link rel="stylesheet" type="text/css" href="../assets/login/css/main.css">
<?php
include("../inc/header.php");?>


                <img id="promotionLogo" src="../assets/pictures/GCCMEC.png" alt="member icon" height="100px" style= "margin-left: 500px" >
                <p>
                </p>
            </div>
					</span>
                <span class="login100-form-title">
                        Bienvenue au page de Promotion
                    <br>

					</span>
<form action="../controllers/upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
            <br>
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



