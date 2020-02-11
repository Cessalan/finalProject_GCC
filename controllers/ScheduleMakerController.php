<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-02-05
 * Time: 4:10 PM
 */
include("../DB/DBManager.php");

$dateSelected = $_GET['date'];
$emp1 = $_GET['emp1'];
$emp2 = $_GET['emp2'];
$emp3 = $_GET['emp3'];
$emp4 = $_GET['emp4'];

if(isset($_GET['date'])&&isset($_GET['emp1'])&&isset($_GET['emp2'])&&isset($_GET['emp3'])&&isset($_GET['emp4'])){


    echo insertWeeklySchedule($dateSelected,$_GET['emp1'],$_GET['emp2'],$_GET['emp3'],$_GET['emp4']);


}







