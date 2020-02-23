<?php
	include("../controllers/Email_Sender.php");
include('../DB/DBManager.php');
	\Stripe\Stripe::setVerifySslCerts(false);

	// Token is created using Checkout or Elements!
	// Get the payment token ID submitted by the form:

$confirmation_number = 0;
$fullArray = unserialize($_SESSION['info2']);
$timeSelected = $fullArray[0]['timeSelected'];
$LastName = $fullArray['lName'];
$firstName = $fullArray['fName'];
$dateSelected = $fullArray['dateSelected'];
$phoneSelected = $fullArray['phone'];
$emailSelected = $fullArray['email'];
$serviceSelected = $fullArray[0]['serviceSelected'];
$price = $fullArray[0]['price'];
$radioSelected = $fullArray[0]['radioSelected'];

$order = new AppointmentClass($LastName, $firstName, $emailSelected, $phoneSelected, $timeSelected, $dateSelected, $price, $serviceSelected);
insertAppointement($LastName, $firstName, $emailSelected, $phoneSelected, $timeSelected, $dateSelected, $serviceSelected, $radioSelected, $price);
$confirmation_number = getConfirmationNumber($firstName,$LastName,$timeSelected,$dateSelected);

$confirmationNumber = array (
    "confirmation_Number" => $confirmation_number
);

array_push($fullArray,$confirmationNumber);
$_SESSION['fullInfo'] = serialize($fullArray);

$totalPrice =  number_format($order->getPriceAfterTax(),2);

$payPrice = $totalPrice * 100;
	if (!isset($_POST['stripeToken'])) {
		header("Location: ../views/Appointement.php");
		exit();
	}


	$token = $_POST['stripeToken'];
	$email = $_POST["stripeEmail"];

	// Charge the user's card:
	$charge = \Stripe\Charge::create(array(
		"amount" => $payPrice,
		"currency" => "cad",
		"description" => $serviceSelected,
		"source" => $token,
	));
	$subject = "Appointment Confirmation";

	$message = "Thanks for scheduling an appointment with garage Auto Service!

	            This email confirms your appoint at $timeSelected on $dateSelected at GCC Auto Service Longueuil. Your confirmation number is $confirmation_number
	            If you have questions before your appointment, you could us at 1(450) 647 2000
	            You may cancel your appointment up to 12 hours before the appointment start time
	            
	           
	            Thanks for booking with us!
	            Garage Auto Service team";

	sendMail($subject,$message,trim($emailSelected));

echo '<script type="text/javascript">window.location = "../views/Invoice.php"</script>';
exit();
