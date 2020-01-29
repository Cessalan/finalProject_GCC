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

if(!is_numeric($_GET['fName']) ){
    if(!is_numeric($_GET['lName'])){
        if(is_numeric($_GET['phone'])) {
            if(isset($_GET["bday"]) && ($_GET["bday"] >= date('yy-m-d'))) {


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