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

                    <!-- Break -->
                    <div class="col-12">
                        <select name="services" id="services" >
                            <option selected="selected" class="services"><?php echo SERVICE_QUESTION ?>  </option>
                        <?php
                        foreach($services as $serv)
                        {
                            echo "<option value='$serv[0]'>$serv[1]</option>";
                        }
                        ?>
                        </select>
                    </div>

                    <div class="col-8">
                        <label><?php echo available_hours ?></label>
                    </div>
                    <div class="col-4">
                        <select name ="hours" required>
                            <?php
                            $app_date = $_GET['appointment_date'];
                            $sql_select = "SELECT Time FROM appointment WHERE date='".$_GET['appointment_date']."'";

                            $res=$conn->query($sql_select) or die($conn->error);
                            if($res->num_rows > 0){
                                while($rec = $res ->fetch_array()){
                                    array_push($available_hours, $sql_select);
                                    print_r($available_hours);
                                }
                            }
                            $FREE_HOURS = array_diff(NORMAL,$available_hours);

                            foreach($FREE_HOURS as $item)
                            {
                                echo "<option value='$item'>$item</option>";
                            }
                            ?>
                        </select>
                        <?php
                       print_r($available_hours);
                      /*  print_r($FREE_HOURS);*/
                        ?>
                    </div>
                    <!-- Break -->
                    <div class="col-4 col-12-small">
                        <label><?php echo CONTACT_LABEL?></label>
                    </div>


                    <div class="col-2 col-12-small">
                        <input type="radio" id="demo-radio-alpha" name="demo-radio"  value="phone"checked>
                        <label for="demo-radio-alpha"><?php echo placeholder_phone?></label>
                    </div>
                    <div class="col-2 col-12-small">
                        <input type="radio" id="demo-radio-beta" name="demo-radio" value="email">
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