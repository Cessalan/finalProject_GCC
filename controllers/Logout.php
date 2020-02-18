<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-02-11
 * Time: 1:29 PM
 */
session_start();
unset($_SESSION['currentAccount']);
header("location: ../views/Login.php");
