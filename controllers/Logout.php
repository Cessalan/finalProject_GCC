<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-02-11
 * Time: 1:29 PM
 */
session_start();
unset($_SESSION['currentAccount']);
unset($_SESSION['currentUserID']);

header("location: ../views/Login.php");
