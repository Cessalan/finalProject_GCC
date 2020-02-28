<?php
/**
 *
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-14
 * Time: 4:12 PM
 */
include('../inc/header.php');
include('../DB/DBManager.php');



if(isset($_GET['email']) && isset($_GET['pass']) && isset($_GET['pass_confirm'])){

    $mail=$_GET['email'];
    $pass=$_GET['pass'];
    $confirmation=$_GET['pass_confirm'];

    if($pass==$confirmation){
        insertAccount($mail,$pass);
    }
}
