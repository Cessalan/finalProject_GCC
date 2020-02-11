<?php
include('../inc/config.php');
function connection(){

    $conn = new mysqli("localhost:3308","root","","gcc");
    if($conn->error){
        echo $conn->error;
    }
    return $conn;
}


//create account in db when admin creates account
function insertAccount($email,$password){
    $conn=connection();

    $hash=password_hash($password,PASSWORD_DEFAULT);

    $sqlCreateAccount="INSERT into account (email, password) values('$email','$hash')";


    $accountCheck="Select * from account where email='".$email."'";
    $sqlAccountExists=$conn->query($accountCheck);
    if($sqlAccountExists->num_rows>1){
        echo "This account already exists";
    }else{
        $conn->query($sqlCreateAccount)or die($conn->error);
    }


}


//search for account int the database when user logs in
function  getAccount($email,$pwd){

    $conn=connection();

    $sqlGetAccount="SELECT * from account where email='".$email."'";


    $result=$conn->query($sqlGetAccount)or die($conn->error);
    if($result->num_rows==1){
        while($rec=$result->fetch_array()){
            $hash=$rec["password"];
            if(password_verify($pwd,$hash)){
              return "logged";
            }else{
                return "wrong password";
            }
        }
    }else{

       return "account doesnt exist";
    }




}


//updates account
function updateAccount($email,$fname,$lname,$phone,$address,$zip){
$conn=connection();
$sqlUpdateAccount="UPDATE account set first_name='$fname',
                    last_name='$lname',
                    phone_number='$phone',
                    address='$address',
                    zip='$zip'  where email='$email' 
                    ";
$conn->query($sqlUpdateAccount) or die($conn->error);


}


//change user's password
function updatePassword($email,$oldPassword,$newPassword){
$conn=connection();

// get old hash from database
$sqlGetOldPassword="Select password from account where email='".$email."'";
$hash=$conn->query($sqlGetOldPassword) or die($conn->error);

//hash new password
$newPassword=password_hash($newPassword,PASSWORD_DEFAULT);

//update password if validation is correct
$sqlUpdatePassword="Update account set passoword='$newPassword' where email='$email'";
if(password_verify($oldPassword,$hash)){
    $conn->query($sqlUpdatePassword) or die ($conn->error);
}


}

//get hours for a specific date
function getHours($date){
    $conn=connection();
    $sqlGetHours="SELECT time FROM appointment WHERE date='".$date."'";
    $result=$conn->query($sqlGetHours);

    if($result->num_rows>1){

    }else if($result->num_rows>3){

    }else{


    }
}

function getAvailabilities($availabilities){
    $conn=connection();
    $sqlInsertDays="";

}

//insert appointment in the db when users books an appointment

//Get all the information about a user using his email
function getAccountInfos($email){
    $conn=connection();
    $info= array();

    $salGetAccountInfo="SELECT * FROM account where email='".$email."'";
    $results=$conn->query($salGetAccountInfo) or die($conn->error);
    if($results->num_rows==1){
       while($record=$results->fetch_array()){
           $info["fname"]=$record["first_name"];
           $info["lname"]=$record["last_name"];
           $info["phone_number"]=$record["phone_number"];
           $info["address"]=$record["address"];
           $info["zip"]=$record["zip"];
       }
    }


 return $info;
}


function insertSubscriber($email){
    $conn=connection();
    $sqlInsertSubscriber="INSERT INTO subscription(email) values ('$email')";
    $conn->query($sqlInsertSubscriber) or die($conn->error);

}


//get all the subscribers from the subscribers table
function getSubscribers(){
    $conn=connection();
    $subscriber_array=array();

    $sqlGetSubscribers="SELECT * FROM subscription";
    $result=$conn->query($sqlGetSubscribers)or die($conn->error);

    if($result->num_rows>0){

        while($record=$result->fetch_array()){

            array_push($subscriber_array,$record["email"]);
        }
    }

return $subscriber_array;
}

define("NORMAL" ,array("8:30","9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","15:00","15:30"
,"16:00", "16:30", "17:00"));
define("SAT_HOURS", array("\"9:00\",\"9:30\",\"10:00\",\"10:30\",\"11:00\",\"11:30\",\"12:00\",\"12:30\",\"13:00\",\"13:30\",\"14:00\",\"15:00\",\"15:30\"
                        ,\"16:00\""));
$available_hours = array();

$services=array(
    // service, price
    array("huile",SERVICE_HUILE,49.99),
    array("alignment",SERVICE_ALIGNMENT,119.99),
    array("injection",SERVICE_INJECTION,69.99),
    array("echappment",SERVICE_ECHAPPMENT,99),
    array("pare-brise",SERVICE_PARE_BRISE,150.50),
    array("anaylse_moteur",SERVICE_ANAYLSE_MOTEUR,99.99),
    array("frein",SERVICE_FREINS,80.99));


