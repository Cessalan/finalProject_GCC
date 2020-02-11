<?php
session_start();
include("../inc/header.php");
include('../DB/DBManager.php');
include('../class/AppointmentClass.php');

$conn = connection();

$display_block = "<h1>Your Shopping Cart</h1><br>";
$infoArray = array();

?>

<?php


if (empty($_SESSION['info'])) {
    //print message
    $display_block .= "<p>You have no items in your cart.
            Please <a href=\"Appointement.php\">Make a reservation</a>!</p>";

}
else {
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
            <div class="login100-pic js-tilt" >
                <br><br><br>
                <img id="imgPosition" src="../assets/pictures/GCCMEC.png" alt="member icon" height="100px" >

            </div>

<?php
    $display_block .= "
    <table class='table' celpadding=\"3\" cellspacing=\"2\" border=\"1\" width=\"98%\">
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Date/Time</th>
	<th>Service</th>
    <th>Price</th>
	<tr>";
    if (isset($_GET['demo-radio'])) {
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
        foreach($services as $service) {
            if (isset($_GET['services']) && $_GET['services'] == $service[0]) {


                $price = $service[2];
            }
        }
        $add_sql = "INSERT into appointment(date, Time, status, customer_LastName, customer_FirstName, customer_phone, customer_email,service,contactChoise)
                                                VALUES('" . $dateSelected . "','" . $timeSelected . "','" . "enable" . "','" . $LastName . "','" . $firstName .
                                                "','" . $phoneSelected . "','" . $emailSelected . "','" . $serviceSelected . "','" . $radioSelected . "')";

        $add_res = $conn->query($add_sql) or die($conn->error);

        $order = new AppointmentClass($LastName,$firstName,$emailSelected,$phoneSelected,$timeSelected,$dateSelected,$price,$serviceSelected);

        $display_block.= "<td>".$order->getFName()."</td>";
        $display_block.= "<td>".$order->getLName()."</td>";
        $display_block.= "<td>".$order->getEmail()."</td>";
        $display_block.= "<td>".$order->getPhone()."</td>";
        $display_block.= "<td>".$order->getDate().' '. $order->getTime(). "</td>";
        $display_block.= "<td>".$order->getService()."</td>";
        $display_block.= "<td>".number_format($order->getPrice(),2).'$'."</td>";
        $display_block.="</table>";

        $display_block .= "</table>";
        $display_block.= "<table align='right' class=' table-striped' celpadding=\"3\" cellspacing=\"2\" border=\"1\" width=\"30%\">
				<tr><th align='center'>Total Before Tax:</th><td align='center'> $".number_format($order->getPrice(),2)."</td></tr>";
        $display_block.="<tr><th align='center'>Tax Amount:</th><td align='center'>$".number_format($order->getTax(),2)."</td></tr>";
        $display_block.="<tr><th align='center'>Total After Tax:</th><td align='center'>$".number_format($order->getPriceAfterTax(),2)."</td></tr></table>";

        $display_block.=
            "<form action='deleteCart.php'>
                <input type='submit' value='Remove from cart'  class='btn btn-secondary btn-lg active'role='button'>
</form>";
    }
}
echo $display_block;
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




