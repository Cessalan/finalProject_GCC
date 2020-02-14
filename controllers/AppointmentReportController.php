<?php
session_start();
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-02-12
 * Time: 1:40 PM
 */
include ("../DB/DBManager.php");
$_SESSION["appointment_report"]="";
if(isset($_GET['choice'])){

    $_SESSION['choice']=$_GET['choice'];

    if($_GET['choice']=="all"){

            $result=createAppointmentTable(getAllAppointments());

            $_SESSION["appointment_report"]=$result;


            header("Location:../views/AppointmentReport.php");

    }elseif ($_GET['choice']=="cancelled") {

            $result=createAppointmentTable(getCancelledAppointments());

            $_SESSION["appointment_report"]=$result;

            header("Location:../views/AppointmentReport.php");

    }elseif($_GET['choice']=="today"){

            $result=createAppointmentTable(getTodayAppointments());

            $_SESSION["appointment_report"]=$result;

            header("Location:../views/AppointmentReport.php");

    }elseif($_GET['choice']=="week"){

        $result=createAppointmentTable(getWeeklyAppointment());

        $_SESSION["appointment_report"]=$result;

        header("Location:../views/AppointmentReport.php");

    }elseif($_GET['choice']=="tomorrow"){


        $result=createAppointmentTable(getTomorrowAppointment());

        $_SESSION["appointment_report"]=$result;

        header("Location:../views/AppointmentReport.php");

    }



}