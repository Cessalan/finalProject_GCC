<?php
session_start();
include('../DB/DBManager.php');

$mail=$_GET['email'];
$pass=$_GET['pass'];


if(getAccount($mail,$pass)=="logged" && $mail=="garagecheminchambly@gmail.com"){
    $createAccount="../views/AdminPanel.php";
    header("location:".$createAccount);

}else if(getAccount($mail,$pass)=="logged"){
    $_SESSION['currentAccount']=$mail;
    $employeeSchedule="../views/Availability.php";
    header("location:".$employeeSchedule);

} else{
    $loginPage="../views/Login.php?error=Erreur,ressayez de nouveau.";
    header("location:".$loginPage);
}




