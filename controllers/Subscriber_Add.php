<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-20
 * Time: 3:22 PM
 */

include('../DB/DBManager.php');
$m="";
if(isset($_GET['email'])){
    insertSubscriber($_GET['email']);

    if(isset($_SESSION['lang'])){
        if($_SESSION['lang']=="en"){
            $m="You are subscribed";
        }else{
            $m="Vous etes abonne";
        }
    }
    header("location:../views/home.php?m=$m");
}
