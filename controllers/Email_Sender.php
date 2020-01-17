<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-17
 * Time: 10:00 AM
 */
require('../PHPMailer/src/PHPMailer.php');
require('../PHPMailer/src/Exception.php');
require ('../PHPMailer/src/SMTP.php');

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

$mail= new PHPMailer();
$mail->isSMTP();
$mail->host="smtp@gmail.com";
$mail->SMTPAuth=true;
//$mail->SMTPSecure="tls";
$mail->port="587";
$mail->username="rockmichael655@gmail.com";
$mail->Password="Fuckyou1234";

$mail->Subject="Test Email Final Project";
$mail->setFrom("rockmichael655@gmail.com");
$mail->Body="PIK PIK PUC PUC THASSA GUN HOMIE";
$mail->addAddress("haroonmasjide@gmail.com");

if($mail->Send()){
    echo "Email Sent.";
}else{
    echo $mail->isError();
};
$mail->smtpClose();