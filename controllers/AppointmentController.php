<?php
include('../DB/connection.php');

define("NORMAL" ,array("8:30","9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","15:00","15:30"
                        ,"16:00", "16:30", "17:00"));
define("SAT_HOURS", array("\"9:00\",\"9:30\",\"10:00\",\"10:30\",\"11:00\",\"11:30\",\"12:00\",\"12:30\",\"13:00\",\"13:30\",\"14:00\",\"15:00\",\"15:30\"
                        ,\"16:00\""));
$available_hours = array();


$fName=$_GET['fName'];
$lName=$_GET['lName'];
$phone=$_GET['phone'];
$email=$_GET['email'];
$bday=$_GET['bday'];
$contact_choice=$_GET['demo-radio'];
$message=$_GET['message'];

if(!is_numeric($_GET['fName']) ){
    if(!is_numeric($_GET['lName'])){
        if(is_numeric($_GET['phone'])) {
            if (isset($_GET["bday"]) && ($_GET["bday"] >= date('yy-m-d'))) {

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