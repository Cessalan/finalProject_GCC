<?php
include("../inc/header.php");
include('../models/AppointmentClass.php');

if(isset($_SESSION['fullInfo'])){
$infoArray = unserialize($_SESSION['fullInfo']);
$timeSelected = $infoArray[0]['timeSelected'];
$LastName = $infoArray['lName'];
$firstName = $infoArray['fName'];
$dateSelected = $infoArray['dateSelected'];
$phoneSelected = $infoArray['phone'];
$emailSelected = $infoArray['email'];
$serviceSelected = $infoArray[0]['serviceSelected'];
$price = $infoArray[0]['price'];
$confirmationNumber = $infoArray[1]['confirmation_Number'];

$order = new AppointmentClass($LastName, $firstName, $emailSelected, $phoneSelected, $timeSelected, $dateSelected, $price, $serviceSelected);
$taxes = $order->getTax();
$totalPrice = $order->getPriceAfterTax();
?>
<title>Invoice</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../assets/appoint/util.css">
<link rel="stylesheet" type="text/css" href="../assets/appoint/main.css">
<!--===============================================================================================-->
<body class="is-preload">


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="invoice-box">
                <div style="overflow-x:auto;">
                <table cellpadding="0" cellspacing="0">
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title">
                                        <img src="../assets/pictures/GCCMEC.png" alt="icon">
                                    </td>

                                    <td><br>
                                        Invoice <br>
                                        Confirmation ID: <?php echo $confirmationNumber ?><br>
                                        Created: <?php echo date("Y-m-d") ?>
                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="information">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td>
                                        Chemin Chambly Auto Service, Inc.<br>
                                        2271 Chemin Chambly <br>
                                        Longueuil, QC J4J 3Z5
                                    </td>


                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="heading">
                        <td>
                            Payment Method
                        </td>

                        <td>
                            Credit Card #
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Reservation Date
                        </td>

                        <td>
                            <?php echo $dateSelected . ' ' . $timeSelected; ?>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            Client Name
                        </td>

                        <td>
                            <?php echo $LastName . " " . $firstName; ?>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            Email
                        </td>

                        <td>
                            <?php echo $emailSelected; ?>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            Phone
                        </td>

                        <td>
                            <?php echo $phoneSelected; ?>
                        </td>

                    </tr>
                    <tr class="heading">
                        <td>
                            Service
                        </td>

                        <td>
                            Price
                        </td>
                    </tr>

                    <tr class="item">
                        <td>
                            <?php echo $serviceSelected; ?>
                        </td>

                        <td>
                            <?php
                            echo $price;
                            ?>$
                        </td>
                    </tr>

                    <tr class="item last">
                        <td>
                            Taxes
                        </td>

                        <td>
                            <?php
                            echo number_format($taxes, 2);
                            ?>$
                        </td>
                    </tr>


                    <tr class="total">
                        <td></td>

                        <td>

                            Total: <?php echo number_format($totalPrice, 2); ?>$
                        </td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
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
    <script src="../assets/login/js/main.js"></script>
    <?php
    include(PREAMBLE . 'inc/scripts.php');


    //session_destroy();
    }
else{
    header("Location: ../views/Home.php");
}?>
</div>
</body >