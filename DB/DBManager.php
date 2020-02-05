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


//insert appointment in the db when users books an appointment

//Get all the information about a user using his email
function getAccountInfos($email){
    $conn=connection();
    $info= array();

    $salGetAccountInfo="SELECT * FROM account where email='".$email."'";
    $results=$conn->query($salGetAccountInfo) or die($conn->error);
    if($results->num_rows==1){
        while($record=$results->fetch_array()){
            $info["id"]=$record["emp_id"];
            $info["fname"]=$record["first_name"];
            $info["lname"]=$record["last_name"];
            $info["phone_number"]=$record["phone_number"];
            $info["address"]=$record["address"];
            $info["zip"]=$record["zip"];


        }
    }


    return $info;
}

function getAccountList(){
    $conn=connection();
    $info= array();
    $list=array();

    $salGetAccountInfo="SELECT * FROM account ";
    $results=$conn->query($salGetAccountInfo) or die($conn->error);
    if($results->num_rows>1){
        while($record=$results->fetch_array()){
            $info["id"]=$record["emp_id"];
            $info["fname"]=$record["first_name"];
            $info["lname"]=$record["last_name"];
            $info["email"]=$record["email"];
            $info["phone_number"]=$record["phone_number"];
            $info["address"]=$record["address"];
            $info["zip"]=$record["zip"];
            array_push($list,$info);

        }

    }


    return $list;
}
function getUserName($id){
    $conn=connection();
    $info="";

    $salGetAccountInfo="SELECT * FROM account where emp_id='".$id."'";
    $results=$conn->query($salGetAccountInfo) or die($conn->error);
    if($results->num_rows==1){
        while($record=$results->fetch_array()){

            $info.=$record["first_name"];
            $info.=$record["last_name"];


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

function insertAvailabilities($emp_id,$array){
    $conn=connection();
    $numbers=implode(",",$array);

    $deleteExistingAvailabilities="DELETE from availabilities where emp_id='".$emp_id."'";
    $sqlInsertAvailabilities="INSERT into availabilities (emp_id,lundi,mardi,mercredi,jeudi,vendredi,samedi,dimanche)
    values($emp_id,$numbers)";

    $conn->query($deleteExistingAvailabilities) or die($conn->error);
    $conn->query($sqlInsertAvailabilities)or die($conn->error);
}

function getAvailabilities(){
    $conn=connection();
    $table="<table width=\"40\"><tr><th>Nom</th><th>Lundi</th><th>Mardi</th><th>Mercredi</th><th>Jeudi</th><th>Vendredi</th><th>Samedi</th><th>Dimanche</th></tr>";
    $sqlGetAvailabilities="SELECT * FROM availabilities";
    $result=$conn->query($sqlGetAvailabilities) or die($conn->error);


    if($result->num_rows>0){
        while($rec=$result->fetch_array()){
            $table.="<tr><td>".getUserName($rec['emp_id'])."</td>
                          <td>".x($rec['lundi'])."</td>
                          <td>".x($rec['mardi'])."</td>
                          <td>".x($rec['mercredi'])."</td>
                          <td>".x($rec['jeudi'])."</td>
                          <td>".x($rec['vendredi'])."</td>
                          <td>".x($rec['samedi'])."</td>
                          <td>".x($rec['dimanche'])."</td>
                    
                    </tr></table>";
        }
    }

    return $table;
}

function x($num){
    if($num==1){


        return " 8:30am-Fermeture";
    }else{
        return " ";
    }
}
