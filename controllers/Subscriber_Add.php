<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-20
 * Time: 3:22 PM
 */
session_start();
include('../DB/DBManager.php');
$m="";
if(isset($_GET['email'])){
    insertSubscriber($_GET['email']);

    if(isset($_SESSION['lang'])){
        if($_SESSION['lang']=="en"){
            $_SESSION['subscribeMsg']="You are now a subscriber,thank you.";
        }else{
            $_SESSION['subscribeMsg']="Vous venez de vous abonner,merci.";
        }
    }
    header("location:../views/home.php");
}
