<?php
function connection(){

    $conn = new mysqli("127.0.0.1","root","","gcc");
    if($conn->error){
        echo $conn->error;
    }
    return $conn;
}

//search for account int the database when user logs in
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

//create account in db when admin creates account
function insertAccount($email,$username,$password){
    $conn=connection();
    $sqlCreateAccount="INSERT into account (email, password) values($email,$password)";
    if(getAccount($email,$password)){
        //error page or message
    }else{
        //create new account
        $result=$conn->query($sqlCreateAccount);

        if($result===true){
            //successful

        }else{
            //error message

        }

    }
}

//insert appointment in the db when users books an appointment
function insertAppointment(){
  $conn=connection();
  $sqlInsertAppointment="";
}


