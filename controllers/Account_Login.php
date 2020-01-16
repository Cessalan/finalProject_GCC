<?php
session_start();
include('../DB/DBManager.php');

$mail=$_GET['email'];
$pass=$_GET['pass'];

if(getAccount($mail,$pass)=="logged"){
    $_SESSION['currentAccount']=$mail;
    $employeeSchedule="../views/Availability.php";
   header("location:".$employeeSchedule);

}else if(getAccount($mail,$pass) && $mail=="FatsyRamp@gmail.com"){
    $createAccount="../views/CreateAccount.php";
    header("location:".$createAccount);

}else{
    $loginPage="../views/Login.php?error=Erreur,ressayez de nouveau.";
    header("location:".$loginPage);
}




