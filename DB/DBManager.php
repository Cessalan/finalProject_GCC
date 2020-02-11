<?php
//connection to the database
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



//Get all the information about a specific user using his email
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
//stores the employees and their related infos in an array for display
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

// display employee email,fname & lname in a string
function getEmployeeDetails($id){

    $conn=connection();
    $info="";

    $salGetAccountInfo="SELECT * FROM account where emp_id='".$id."'";
    $results=$conn->query($salGetAccountInfo) or die($conn->error);
    if($results->num_rows==1){
        while($record=$results->fetch_array()){

            $info.=$record["first_name"]."<br>";
            $info.=$record["last_name"]."<br>";
            if($record["first_name"]==null||$record["last_name"]==null){
                $info.=$record["email"];
            }else{
                $record["email"]="";
                $info.=$record["email"];
            }




        }
    }


    return $info;
}
 //insert subscriber into the Subscriber table
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
//insert employee's availabilities in DB//////
function insertAvailabilities($emp_id,$array){
    $conn=connection();
    $numbers=implode(",",$array);

    $deleteExistingAvailabilities="DELETE from availabilities where emp_id='".$emp_id."'";
    $sqlInsertAvailabilities="INSERT into availabilities (emp_id,lundi,mardi,mercredi,jeudi,vendredi,samedi,dimanche)
    values($emp_id,$numbers)";

    $conn->query($deleteExistingAvailabilities) or die($conn->error);
    $conn->query($sqlInsertAvailabilities)or die($conn->error);
}
// displays the availabilities of each employee in a table/////
function getAvailabilities(){
    $conn=connection();
    $table="<table  class=\"table-wrapper\" width=\"40\"><tr><th>Nom</th><th>Lundi</th><th>Mardi</th><th>Mercredi</th><th>Jeudi</th><th>Vendredi</th><th>Samedi</th><th>Dimanche</th></tr>";
    $sqlGetAvailabilities="SELECT * FROM availabilities";
    $result=$conn->query($sqlGetAvailabilities) or die($conn->error);

    if($result->num_rows>0){
        while($rec=$result->fetch_array()){
            $table.="<tr><td>".getEmployeeDetails($rec['emp_id'])."</td>
                          <td>".x($rec['lundi'])."</td>
                          <td>".x($rec['mardi'])."</td>
                          <td>".x($rec['mercredi'])."</td>
                          <td>".x($rec['jeudi'])."</td>
                          <td>".x($rec['vendredi'])."</td>
                          <td>".x($rec['samedi'])."</td>
                          <td>".x($rec['dimanche'])."</td>
                    
                    </tr>";
        }
    }
    $table.="</table>";
    return $table;
}

//goes with getAvailabilities to format the display
function x($num){
    if($num==1){


        return " 8:30am-Fermeture";
    }else{
        return " ";
    }
}

function execute($statement){
    $conn=connection();
    $res= $conn->query($statement) or die($conn->error);
    return $res;
}

//insert weekly schedule made by the admin in the DB
function insertWeeklySchedule($date,$emp1,$emp2,$emp3,$emp4){
    $sql_check="Select * from schedule where selectedDay='".$date ."'";
    $res=execute($sql_check);

    if($res->num_rows>0){
        $sql_update="Update schedule set emp1='$emp1',emp2='$emp2',emp3='$emp3',emp4='$emp4' where selectedDay='$date'";
        execute($sql_update);
    }else{

        $add_sql = "INSERT into schedule(selectedDay,emp1,emp2,emp3,emp4)
             VALUES('" . $date . "','" . $emp1 . "','".$emp2."','" . $emp3 . "','" . $emp4 . "')";
        execute($add_sql);
    }

}
function conversion(){
    $french_days=array(
        "Mon"=>"Lundi",
        "Tue"=>"Mardi",
        "Wed"=>"Mercredi",
        "Thu"=>"Jeudi",
        "Fri"=>"Vendredi",
        "Sat"=>"Samedi",
        "Sun"=>"Dimanche"
    );
    return $french_days;
}

//displays the weekly schedule
function displayWeeklySchedule()
{
    $french_days=conversion();
    $sqlGetSchedule = "SELECT * From schedule where selectedDay > NOW() order by selectedDay ASC  ";

    $res = execute($sqlGetSchedule);

    $table = "<table  class=\"table-wrapper\" width=\"40\"><tr>
    <th>Jour/Date</th><th>Employée 1</th><th>Employé 2</th><th>Employé 3</th><th>Employeé 4</th></tr>";

    if ($res->num_rows > 0) {
        while ($rec = $res->fetch_array()) {
        $table.="<tr>
                <td>".$french_days[date('D', strtotime($rec['selectedDay']))]."<br>".$rec['selectedDay']."</td>

                <td>".getEmployeeDetails($rec['emp1'])."</td>
                
                <td>".getEmployeeDetails($rec['emp2'])."</td>
                
                <td>".getEmployeeDetails($rec['emp3'])."</td>
                
                <td>".getEmployeeDetails($rec['emp4'])."</td>
                "
                ;
        }
        $table .= "</tr></table>";

        return $table;
    }
}

function doSelect($statement,$action){
   $res= execute($statement);
   if($res->num_rows>0){
        while($rec=$res->fetch_array()){
            $action;
        }
   }
}

function displayIndividualSchedule($id){
    $french_days=conversion();

    $sqlGetDates="Select * From schedule where emp1='".$id."' or emp2='".$id."' or emp3='".$id."' or emp4='".$id."'  and
    selectedDay > NOW() order by selectedDay ASC ";
    $res=execute($sqlGetDates);
    $table="<table><tr><th>Date</th><th>Periode 1</th><th>Pause</th><th>Periode 2</th></tr>";
    if($res->num_rows>0){
        while($rec=$res->fetch_array()){
            $day=$french_days[date('D', strtotime($rec['selectedDay']))];
            $table.="<tr>  
            <td>".$french_days[date('D', strtotime($rec['selectedDay']))]."<br>".$rec['selectedDay']."</td>
            <td>8:30 - 12:00 </td><td>12:00-13:00</td>
            ";
            if($day=="samedi"){
                $table.="<td>13:00-16:00</td>";
            }else{
                $table.="<td>13:00-17:00</td>";
            }
            $table.="<tr>";
        }

    }
    $table.="</table>";
    return $table;
}