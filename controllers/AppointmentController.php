<?php
include("../inc/header.php");
include('../DB/DBManager.php');
$conn = connection();

$fName=$_GET['fName'];
$lName=$_GET['lName'];
$phone=$_GET['phone'];
$email=$_GET['email'];
$bday=$_GET['appointment_date'];
$info = array (
    "fName"=>$fName,
    "lName"=>$lName,
    "phone"=>$phone,
    "email"=>$email,
    "dateSelected" =>$bday);
$_SESSION['info'] = serialize($info);
if (!empty($_GET)) {
    if (!is_numeric($_GET['fName'])) {
        if (!is_numeric($_GET['lName'])) {
            if (is_numeric($_GET['phone'])) {
                if (isset($_GET["appointment_date"]) && ($_GET["appointment_date"] >= date("Y-m-d"))) {


                    echo $_SESSION['info'] . '<br>';


                    /*                    $add_sql = "INSERT into appointment
                                                (date, Time, status, customer_LastName, customer_FirstName, customer_phone, customer_email,service)
                                                VALUES('" . $bday . "','" . $app_time . "','"."enable"."','" . $lName . "','" . $fName . "','" . $phone . "','" . $email . "','".$services."')";
                                        $add_res = $conn->query($add_sql) or die($conn->error);*/


                } else
                    echo "Please select a valid date";
                echo "<br> <a href='../views/Appointement.php'>Go back.</a>";
            } else {
                echo "Please enter a valid phone number";
                echo "<br> <a href='../views/Appointement.php'>Go back.</a>";

            }
        } else {

            echo "The last name cannot be numeric";
            echo "<br> <a href='../views/Appointement.php'>Go back.</a>";
        }
    } else {
        echo "The first name cannot be numeric";
        echo "<br> <a href='../views/Appointement.php'>Go back.</a>";
    }
}
?>
<title>Appointment</title>
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
            <div style="overflow-x:auto;">
                <div class="login100-pic js-tilt" data-tilt>
                    <br><br><br>
                    <img id="imgPosition" src="../assets/pictures/GCCMEC.png" alt="member icon" height="100px">
                </div>

                <form class="login100-form validate-form" method="GET" action="../controllers/TimeController.php">
					<span class="login100-form-title">
                        <?php
                        echo APPOINTMENT_TEXT
                            . "<br>"
                            .
                            FORM_TEXT
                        ?>
                    </span>
                    <div class="row gtr-uniform">

                        <div class="col-6">
                            <?php
                            echo "<h3> $fName $lName</h3>"
                            ?>
                        </div>
                        <!-- Break -->
                        <div class="col-12">
                            <select name="services" id="services" required>
                                <option value=""><?php echo SERVICE_QUESTION ?>  </option>
                                <?php
                                foreach ($services as $serv) {
                                    echo "<option value='$serv[0]'>$serv[1]" . " $serv[2]" . '$' . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-8">
                            <label><?php echo available_hours ?></label>
                        </div>
                        <div class="col-4">
                            <select name="hours" required>
                                <?php
                                $count = 0;

                                //                            $sql_check_time="SELECT Time COUNT(Time) FROM appointment  WHERE date='".$_GET['appointment_date']."'";
                                //                            $count=$conn->query($sql_check_time) or die ($conn->error);

                                $app_date = $_GET['appointment_date'];
                                $sql_select = "SELECT Time FROM appointment WHERE date='" . $_GET['appointment_date'] . "'";

                                $res = $conn->query($sql_select) or die($conn->error);
                                if ($res->num_rows > 0) {
                                    while ($rec = $res->fetch_array()) {

                                        if ($count->field_count <= 3) {
                                            array_push($available_hours, $rec['Time']);
                                        }
                                    }
                                }
                                $FREE_HOURS = array_diff(NORMAL, $available_hours);


                                foreach ($FREE_HOURS as $item) {
                                    echo "<option value='$item'>$item</option>";
                                }
                                ?>
                            </select>
                            <?php
                            /*                        echo"HOURS PICKED:<BR>";
                                                    print_r($available_hours);
                                                    echo"HOURS DISPLAYED<BR>";
                                                   print_r($FREE_HOURS);*/

                            ?>
                        </div>
                        <!-- Break -->
                        <div class="col-4 col-12-small">
                            <label><?php echo CONTACT_LABEL ?></label>
                        </div>


                        <div class="col-2 col-12-small">
                            <input type="radio" id="demo-radio-alpha" name="demo-radio" checked value="telephone">
                            <label for="demo-radio-alpha"><?php echo placeholder_phone ?></label>
                        </div>
                        <div class="col-2 col-12-small">
                            <input type="radio" id="demo-radio-beta" name="demo-radio" value="email">
                            <label for="demo-radio-beta"><?php echo placeholder_email ?></label>
                        </div>


                        <!-- Break -->
                        <div class="col-12">
                            <textarea name="message" id="message" placeholder="<?php echo MORE_DETAILS ?>"
                                      rows="6"></textarea>
                        </div>
                        <!-- Break -->
                        <div id="act">
                            <ul class="actions">
                                <li><input type="submit" value="<?php echo submit ?>" class="primary"/></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
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
    <script>
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



