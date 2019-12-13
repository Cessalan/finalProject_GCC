<?php
include('../DB/connection.php');
$mail=$_GET['email'];
$pass=$_GET['pass'];
function  getAccount($email,$password){
$conn=connection();
$sqlGetAccount="SELECT email,password FROM  account WHERE email='".$email."'and password='".$password."'";
$result=$conn->query($sqlGetAccount);

if($result->num_rows<1){
return false;
}else{
return true;
}

}

if(getAccount($mail,$pass)){

    $employeeSchedule="../views/Availability.php";
   header("location:".$employeeSchedule);

}else{
    $loginPage="../views/Login.php?error=Erreur,ressayez de nouveau.";
    header("location:".$loginPage);
}




