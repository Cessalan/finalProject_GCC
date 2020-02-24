<?php
//connection to the database
include_once('../inc/header.php');
include('../models/AppointmentClass.php');



function connection(){

    $conn = new mysqli("localhost","root","","gcc");
    if($conn->error){
        echo $conn->error;
    }
    return $conn;
}



/////////////////////////////////////////////ACCOUNT////////////////////////////////////////////////////
//create account in db when admin creates account
function insertAccount($email,$password){
    $conn=connection();

    $hash=password_hash($password,PASSWORD_DEFAULT);

    $sqlCreateAccount="INSERT into account (email, password) values('$email','$hash')";


    $accountCheck="Select * from account where email='".$email."'";
    $sqlAccountExists=$conn->query($accountCheck);
    if($sqlAccountExists->num_rows>0){
        echo "<h1>This account already exists</h1>";
        echo "<br> <a href='../views/CreateAccount.php'><h3>Go back to Promotion Page</h3></a>";
    }else{
        echo "<h1>Account has been created</h1>";
        echo "<br> <a href='../views/Admin.php'><h3>Go back to Promotion Page</h3></a>";

        $conn->query($sqlCreateAccount)or die($conn->error);
    }


}

//reset account password (UPDATE)
function resetPassword($email,$newpass){
    $hash=password_hash($newpass,PASSWORD_DEFAULT);
    $sqlRest="UPDATE account set password='$hash' where email='$email' ";
    execute($sqlRest);
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
                $info=$record["email"];
            }else{
                $record["email"]="";
                $info.=$record["email"];
            }




        }
    }


    return $info;
}

function getAllEmployees(){


    $table="<h2>Liste de tout les employes</h2><table><tr><th>Nom</th><th>Courriel</th><th>Telephone</th><th>Addresse</th><th>Code Postal</th></tr>";

    $salGetAccountInfo="SELECT * FROM account ";
    $results=execute($salGetAccountInfo);
    if($results->num_rows>0){
        while($rec=$results->fetch_array()){

            $table.="<tr><td>".$rec['first_name']."  ".$rec['last_name']."</td>
                         <td>".$rec['email']."</td><td>".$rec['phone_number']."</td>
                         <td>".$rec['address']."</td><td>".$rec['zip']."</td></tr>";

        }
        $table.="</table>";
    }else{
        return "Aucun employer enregistrer";
    }


    return $table;
}


function getIncompleteAccounts(){
    $list="<h2>List de compte(s) incomplet(s)</h2><h3>Email(s):</h3><ul>";

    $salGetAccountInfo="SELECT * FROM account WHERE (first_name is null) or 
                                                      (last_name is null) or
                                                      (address is null) or 
                                                      (email  is null) or 
                                                      (phone_number is null) or 
                                                      (zip is null)  ";
    $results=execute($salGetAccountInfo);
    if($results->num_rows>0){
        while($rec=$results->fetch_array()){

            $list.="<li>".$rec['email']."</li>";

        }
        $list.="</ul>";
    }else{
        return "Excellent, tous les comptes sont complets";
    }


    return $list;

}





////////////////////////////////////////////SUBSCRIBERS//////////////////////////////////////


 //insert subscriber into the Subscriber table
function insertSubscriber($email){

    $sqlInsertSubscriber="INSERT INTO subscription(email) values ('$email')";
    $sqlGetSubscribers="SELECT * FROM subscription WHERE email='$email'";
    $res=execute($sqlGetSubscribers);
    if($res->num_rows<1){
        execute($sqlInsertSubscriber);
        echo "<h1>".subOk."</h1>
                <br> <a href='../views/Home.php'><h3>".goHome."</h3></a>";

    }
    else{
        echo "<h1>".subAlready."</h1>
                <br> <a href='../views/Home.php'><h3>".goHome."</h3></a>";
    }


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


/////////////////////////////////////////AVAILABILITIES///////////////////////////////

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
    $result=execute($sqlGetAvailabilities);

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
function insertAppointement($LastName,$firstName,$emailSelected,$phoneSelected,$timeSelected,$dateSelected,$serviceSelected,$radioSelected,$price){
    $add_sql = "INSERT into appointment(date, Time, status, customer_LastName, customer_FirstName, customer_phone, customer_email,service,contactChoise,price)
                                                VALUES('" . $dateSelected . "','" . $timeSelected . "','" . "enable" . "','" . $LastName . "','" . $firstName .
        "','" . $phoneSelected . "','" . $emailSelected . "','" . $serviceSelected . "','" . $radioSelected . "','" . $price . "')";

    execute($add_sql);
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
    $sqlGetSchedule = "SELECT * From schedule where selectedDay >=CURRENT_DATE  AND selectedDay<= CURRENT_DATE +INTERVAL 7 DAY";

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


//displays the whole (past&future)schedule
function displayWholeSchedule()
{
    $french_days=conversion();
    $sqlGetSchedule = "SELECT * From schedule where selectedDay  order by selectedDay ASC  ";

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


///////////////////////////////////////APPOINTMENT///////////////////////////////////////////////////////////
function getAllAppointments(){
   $arrayOfOrders=array();
    $sqlSelect="SELECT * FROM APPOINTMENT WHERE STATUS='enable'";
    $res=execute($sqlSelect);
    if($res->num_rows>0){
        while($rec=$res->fetch_array()){

            $order= new AppointmentClass(
                $rec['customer_LastName'],
                $rec['customer_FirstName'],
                $rec['customer_email'],
                $rec['customer_phone'],
                $rec['Time'],
                $rec['date'],
                $rec['price'],
                $rec['service']);

           array_push($arrayOfOrders,$order);
        }
    }

   return $arrayOfOrders;

}

function getTodayAppointments(){
    $arrayOfOrders=array();
    $sqlSelect="SELECT * FROM APPOINTMENT WHERE STATUS='enable' AND DATE=current_date ";
    $res=execute($sqlSelect);
    if($res->num_rows>0){
        while($rec=$res->fetch_array()){

            $order= new AppointmentClass(
                $rec['customer_LastName'],
                $rec['customer_FirstName'],
                $rec['customer_email'],
                $rec['customer_phone'],
                $rec['Time'],
                $rec['date'],
                $rec['price'],
                $rec['service']);

            array_push($arrayOfOrders,$order);
        }
    }

    return $arrayOfOrders;

}


function getCancelledAppointments(){
    $appointment_obj=array();
    $sqlSelect="SELECT * FROM APPOINTMENT WHERE STATUS='disable'";
    $res=execute($sqlSelect);
    if($res->num_rows>0){
        while($rec=$res->fetch_array()){
            $order= new AppointmentClass(
                $rec['customer_LastName'],
                $rec['customer_FirstName'],
                $rec['customer_email'],
                $rec['customer_phone'],
                $rec['Time'],
                $rec['date'],
                $rec['price'],
                $rec['service']);

            array_push($appointment_obj,$order);
        }
    }else{
        return null;
    }

    return $appointment_obj;
}

function getWeeklyAppointment(){

    $appointment_obj=array();
    $sqlSelect="SELECT * FROM APPOINTMENT WHERE STATUS='enable' AND date >=CURRENT_DATE  AND date<= CURRENT_DATE +INTERVAL 7 DAY";
    $res=execute($sqlSelect);
    if($res->num_rows>0){
        while($rec=$res->fetch_array()){

            $order= new AppointmentClass(
                $rec['customer_LastName'],
                $rec['customer_FirstName'],
                $rec['customer_email'],
                $rec['customer_phone'],
                $rec['Time'],
                $rec['date'],
                $rec['price'],
                $rec['service']);

            array_push($appointment_obj,$order);
        }
    }

 return $appointment_obj;
}

function getTomorrowAppointment(){

    $appointment_obj=array();
    $sqlSelect="SELECT * FROM APPOINTMENT WHERE STATUS='enable' AND date >=CURRENT_DATE  AND date<= CURRENT_DATE +INTERVAL 1 DAY";
    $res=execute($sqlSelect);
    if($res->num_rows>0){
        while($rec=$res->fetch_array()){

            $order= new AppointmentClass(
                $rec['customer_LastName'],
                $rec['customer_FirstName'],
                $rec['customer_email'],
                $rec['customer_phone'],
                $rec['Time'],
                $rec['date'],
                $rec['price'],
                $rec['service']);

            array_push($appointment_obj,$order);
        }
    }

    return $appointment_obj;
}

function createAppointmentTable($array){
    $estimatedRevenue=0;
    if(!empty($array)){

        $table="<table><tr><th>Date</th><th>Client</th><th>Contact</th><th>Service</th><th>Coût</th></tr>";
        foreach($array as $obj){
            $table.="<tr><td> ".$obj->getDate()."</td>
                      <td>".$obj->getFName() ." ,".$obj->getLName()."</td>
                      <td>Telephone:". $obj->getPhone()."<br>Courriel: ".$obj->getEmail()."</td>
                      <td>".$obj->getService()."</td>
                      <td>".number_format($obj->getPrice(),2)."</td>
                 </tr>";

            $estimatedRevenue+=$obj->getPrice();
            $formattedRevenue=number_format($estimatedRevenue,2);
        }
        $table.="</table><br><h4>Revenu Estimé: .".$formattedRevenue."$</h4>";
        return $table;

    }else{

        return "Aucun resultat disponible";
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




////////////////////////////////APPOINTMENT RELATED ARRAYS//////////////////////////////////////////////
    define("NORMAL" ,array("8:30","9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","15:00","15:30"
    ,"16:00", "16:30", "17:00"));
    define("SAT_HOURS", array("9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","15:00","15:30"
            ,"16:00"));
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

    function getConfirmationNumber($fName, $lName, $timeSelected, $dateSelected)
    {
        $conn = connection();
        $getAppointmentId="Select appointment_id From appointment where customer_LastName ='".$lName."' and customer_FirstName='".$fName.
            "' and Time='".$timeSelected."' and date='".$dateSelected."'";
        $get_item_res = $conn->query($getAppointmentId) or die($conn->error);

        if ($get_item_res->num_rows < 1) {
            //invalid item
            echo  "<p><em>Invalid item selection.</em></p>";
        }else{
            while ($item_info = $get_item_res->fetch_array()) {
                $confirmation_number = $item_info['appointment_id'];

            }
        }
        echo "$confirmation_number";
        return $confirmation_number;

    }
    function matchID($id)
    {
        echo "<h1>Your Appointments</h1><br>";
        $conn = connection();
        $getAppointmentID = "Select * From appointment where appointment_id = '".$id."' AND status = 'enable'";
        $table="<table width=\"20%\"><tr></th><th>First Name</th><th>Last Name</th><th>Date</th><th>Time</th><th>Service</th><th>Price</th></tr>";
        $res=$conn->query($getAppointmentID) or die($conn->error);
        if($res->num_rows>0) {
            while ($rec = $res->fetch_array()) {
                if ($rec['appointment_id'] = $id) {

                    $table .= "<tr>
                          <td>" . ($rec['customer_LastName']) . "</td>
                          <td>" . ($rec['customer_FirstName']) . "</td>
                          <td>" . ($rec['date']) . "</td>
                          <td>" . ($rec['Time']) . "</td>
                          <td>" . ($rec['service']) . "</td>
                          <td>" . ($rec['price']) . "</td></tr>"; ?>
                    <input type='button' value='Cancel Appointment'
                           onclick="deleteme(<?php echo $rec['appointment_id']; ?>)" name="Delete"><br><br>

                    <?php $table .= "</table><br>"; ?>


                    <script language="javascript">
                        function deleteme(delid) {
                            if (confirm("Are you sure, You want to Cancel your Appointment?")) {
                                window.location.href = 'delete.php?del_id=' + delid + '';
                                return true;
                            }
                        }
                    </script>
                <?php }

                else {

                }
                return $table;
            }



        }
        else{
            echo " You have no appointments" .
            "<br> <a href='../views/Cancellation.php'>Go back.</a>";
        }


}

function insertImage($name,$img,$Image)
{
    $insertQuery = "INSERT INTO images (name,imagename) VALUES('$name','$img')";
    $checkImg="SELECT * FROM images where name='$name'";
    $res=execute($checkImg);
    if($res->num_rows==0){
        $result =execute($insertQuery);
        move_uploaded_file($Image, "../controllers/uploads/$img");
        echo "<h1>Image has been added</h1>" .
            "<br> <a href='../views/Promotion.php'>Go back to Promotion page</a>";
        return $result;
    }else {
      echo "<h1>Image could not be added</h1>" .
          "<br> <a href='../views/Promotion.php'>Go back</a>";
    }

}


function getImage()
{
    $conn = connection();
    $selectSQL = "SELECT * from images";
    $display_block = "<select name='pictures' id='pictures' style='width: 350px'>
                        <option value=''>Select a Picture</option>";

    $res = $conn->query($selectSQL) or die($conn->error);
    if ($res->num_rows > 0) {
        while ($rec = $res->fetch_array()) {
            $display_block .= "<option value='" . $rec['imagename'] . "'>".$rec['name']." ". '('.$rec['imagename'].')'."</option>";
        }

    }
    $display_block .="</select>";
    return $display_block;
}
?>




<!--    function deleteAppointment($id)
    {
        $conn = connection();
        $sql_update="Update appointment SET status= 'disable' WHERE appointment_id = '".$id."'";
    }-->
