<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-20
 * Time: 1:35 PM
 */
include('../DB/DBManager.php');
include('../controllers/Email_Sender.php');

function emailSubscriber(){
    $array=getSubscribers();
    foreach($array as $email){
        sendMail("Promotion","Venez nous voir","$email");
    }
}

emailSubscriber();