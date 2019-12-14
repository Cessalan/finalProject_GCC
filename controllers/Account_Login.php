<?php
include('../DB/DBManager.php');

$mail=$_GET['email'];
$pass=$_GET['pass'];

if(getAccount($mail,$pass)){

    $employeeSchedule="../views/Availability.php";
   header("location:".$employeeSchedule);

}else{
    $loginPage="../views/Login.php?error=Erreur,ressayez de nouveau.";
    header("location:".$loginPage);
}




