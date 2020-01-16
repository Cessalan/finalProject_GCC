<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-14
 * Time: 4:12 PM
 */
include('../DB/DBManager.php');

$mail=$_GET['email'];
$pass=$_GET['pass'];
$confirmation=$_GET['pass_confirm'];


insertAccount($mail,$pass);