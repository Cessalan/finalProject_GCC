<?php
session_start();
include('../DB/DBManager.php');

$mail=$_GET['email'];
$pass=$_GET['pass'];


if(getAccount($mail,$pass)=="logged" && $mail=="fatsy"){
    $createAccount="../views/Admin.php";
    $_SESSION['currentAccount']=$mail;
    header("location:".$createAccount);

}else if(getAccount($mail,$pass)=="logged"){
    $user_info=getAccountInfos($mail);
    $_SESSION['currentUserID']=$user_info["id"];
    $_SESSION['currentAccount']=$mail;
    $employeeSchedule="../views/Availability.php";
    header("location:".$employeeSchedule);

} else{
    $loginPage="../views/Login.php?error=Erreur,ressayez de nouveau.";
    header("location:".$loginPage);
}




