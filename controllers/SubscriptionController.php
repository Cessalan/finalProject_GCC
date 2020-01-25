<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-20
 * Time: 1:35 PM
 */
include('../DB/DBManager.php');
include('../controllers/Email_Sender.php');

function emailSubscriber($subject,$message){
    $array=getSubscribers();
    foreach($array as $email){
        sendMail($subject,$message,"$email");
    }
}

emailSubscriber();