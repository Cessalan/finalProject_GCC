<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-02-13
 * Time: 9:35 PM
 */

include ("../DB/DBManager.php");
if(isset($_GET['choice'])){
    $_SESSION['choice']=$_GET['choice'];
    if($_GET['choice']=="all"){

        $_SESSION['employee']=getAllEmployees();

        header("location:../views/EmployeeReport.php");
    }else{

        $_SESSION['employee']=getIncompleteAccounts();

        header("location:../views/EmployeeReport.php");
    }

}