<?php
include('../DB/DBManager.php');

$conn = connection();

$fName=$_GET['fName'];
$lName=$_GET['lName'];
$phone=$_GET['phone'];
$email=$_GET['email'];
$bday=$_GET['appointment_date'];
$contact_choice=$_GET['demo-radio'];
$message=$_GET['message'];
$app_time=$_GET['hours'];




}
if(!is_numeric($_GET['fName']) ){
    if(!is_numeric($_GET['lName'])){
        if(is_numeric($_GET['phone'])) {
            if (isset($_GET["bday"]) && ($_GET["bday"] >= date('yy-m-d'))) {
                $sql_select = "SELECT time FROM appointment WHERE date='".$bday."'";

                $res=$conn->query($sql_select) or die($conn->error);
                if($res->num_rows < 3){
                    array_push($available_hours,$res);


                }

                $sqlStatement ="INSERT into appointment (date, Time, customer_LastName, customer_FirstName, customer_phone, customer_email)
                    values('$date','$time','$lName','$fName','$phone','$email')";

            }
            echo "Please select a valid date";
        }
        echo "Please enter a valid phone number";

        }
        echo "The last name cannot be numeric";
        echo "<br> <a href='../views/Appointement.php'>Go back.</a>";
    }
    echo "The first name cannot be numeric";
    echo "<br> <a href='../views/Appointement.php'>Go back.</a>";





?>