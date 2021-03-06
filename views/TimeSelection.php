<?php

    include("../inc/header.php");
include('../DB/DBManager.php');
$conn = connection();

$display_block = "<h1>".ORDER_DETAILS."</h1><br>";

//$infoArray = array();
?>

    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/appoint/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/appoint/main.css">
    <!--===============================================================================================-->

<body class ="is-preload">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic" >
                <br><br><br>
                <img id="imgPosition" src="../assets/pictures/GCCMEC.png" alt="member icon" height="100px" >
            </div>

            <?php
            if (!isset($_SESSION['info2'])) {
                //print message
                $display_block .= "<p>You have no items in your cart.
            Please <a href=\"../views/Appointement.php\">Make a reservation</a>!</p>";
                echo $display_block;
                }
            else {
            $infoArray = unserialize($_SESSION['info2']);
            if(isset($_SESSION['fullInfo'])) {
                $fullInfoArray = unserialize($_SESSION['fullInfo']);
                if ($infoArray['lName'] == $fullInfoArray['lName'] && $infoArray[0]['serviceSelected'] == $fullInfoArray[0]['serviceSelected']) {
                    header("Location: ../views/Invoice.php");
                }
            }

                $timeSelected = $infoArray[0]['timeSelected'];
                $LastName = $infoArray['lName'];
                $firstName = $infoArray['fName'];
                $dateSelected = $infoArray['dateSelected'];
                $phoneSelected = $infoArray['phone'];
                $emailSelected = $infoArray['email'];
                $serviceSelected = $infoArray[0]['serviceSelected'];
                $price = $infoArray[0]['price'];


                $display_block .= "<table class='table' celpadding=\"3\" cellspacing=\"2\" bordr=\"1\" width=\"98%\">
    <tr>
    <th>".placeholder_fName."</th>
    <th>".placeholder_lName."</th>
    <th>".placeholder_email."</th>
    <th>".placeholder_phone."</th>
    <th>".CDATE."</th>
	<th>Service</th>
    <th>".CPRICE."</th>
	<tr>";
                $order = new AppointmentClass($LastName, $firstName, $emailSelected, $phoneSelected, $timeSelected, $dateSelected, $price, $serviceSelected);
                $taxes = $order->getTax();
                $totalPrice = $order->getPriceAfterTax();
                $payPrice = $totalPrice * 100 + (1);
                //echo $totalPrice;
                $display_block .= "<td>" . $order->getFName() . "</td>";
                $display_block .= "<td>" . $order->getLName() . "</td>";
                $display_block .= "<td>" . $order->getEmail() . "</td>";
                $display_block .= "<td>" . $order->getPhone() . "</td>";
                $display_block .= "<td>" . $order->getDate() . ' ' . $order->getTime() . "</td>";
                $display_block .= "<td>" . $order->getService() . "</td>";
                $display_block .= "<td>" . number_format($order->getPrice(), 2) . '$' . "</td>";
                $display_block .= "</table>";
                $display_block .= "<table align='right' class=' table-striped' celpadding=\"3\" cellspacing=\"2\" border=\"1\" width=\"30%\">
				<tr><th align='center'>".CTOTALBEFORE."</th><td align='center'> $" . number_format($order->getPrice(), 2) . "</td></tr>";
                $display_block .= "<tr><th align='center'>".CTAX."</th><td align='center'>$" . number_format($order->getTax(), 2) . "</td></tr>";
                $display_block .= "<tr><th align='center'>".CTOTAL."</th><td align='center'>$" . number_format($order->getPriceAfterTax(), 2) . "</td></tr></table>";
                $display_block .= "<a href=\"../views/Appointement.php\"><input type=\"button\" value=\"🢀\"  /></a>";
                $display_block .= "<input type='button' value='Cancel' onclick=\"deleteme()\" /></a>";


                $display_block .= '<form action="../controllers/stripeIPN.php"  method="POST">
                <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_maFVZX8AxdhJl3nollGaWeJU00WrJrPO6D"
                       data-amount="' . $payPrice . '"
                        data-name= "' . $serviceSelected . '"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto">
                </script>
            </form>';


                echo $display_block;
                ?>
            <script>
                function deleteme() {
                    if (confirm("You want to cancel your appointment?")) {
                        location.href = "../controllers/ResetInvoice.php";
                    }
                }

            </script>
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
            scale: 0.7
        })
    </script>

    <!--===============================================================================================-->
    <script src="../assets/login/js/main.js"></script>
    <?php
    include(PREAMBLE.'inc/scripts.php');



    ?>

</div>
</body>