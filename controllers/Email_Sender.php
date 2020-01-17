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
$mail->Host="smtp.gmail.com";
$mail->SMTPAuth=true;
$mail->SMTPSecure="TLS";
$mail->Port="587";
$mail->Username="rockmichael655@gmail.com";
$mail->Password="Fuckyou1234";


try{
    $mail->setFrom("rockmichael655@gmail.com");
    $mail->addAddress("haroonmasjide@gmail.com");

}catch (Exception $e){
    $e->getMessage();
}
$mail->Subject="Test Email Final Project";
$mail->Body="PIK PIK PUC PUC THASSA GUN HOMIE";



$mail->SMTPDebug = 2;

if($mail->Send()){
    echo "Email Sent.";
}else{
    echo $mail->ErrorInfo;
};
$mail->smtpClose();