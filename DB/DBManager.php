<?php
function connection(){

    $conn = new mysqli("127.0.0.1","root","","gcc");
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



//insert appointment in the db when users books an appointment
function insertAppointment(){
  $conn=connection();
  $sqlInsertAppointment="";
}


function getAccountInfos($email){
    $conn=connection();
    $info= array();

    $sqlGetAcccountInfos="SELECT * FROM account where email='".$email."'";
    $results=$conn->query($sqlGetAcccountInfos) or die($conn->error);
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


