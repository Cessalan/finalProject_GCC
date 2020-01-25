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
function sendMail($subject,$message,$recipient){
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
        $mail->addAddress($recipient);

    }catch (Exception $e){
        $e->getMessage();
    }
    $mail->Subject=$subject;
    $mail->Body=$message;
    $mail->SMTPDebug = 2;

    if($mail->Send()){
        echo "Email Sent.";
    }else{
        echo $mail->ErrorInfo;
    };
    $mail->smtpClose();
}
