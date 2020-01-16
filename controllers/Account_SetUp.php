<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-16
 * Time: 10:51 AM
 */
session_start();

include('../DB/DBManager.php');
$email=$_SESSION['currentAccount'];

updateAccount($email,$_GET['fname'],$_GET['lname'],$_GET['telephone'],$_GET['address'],$_GET['zip']);