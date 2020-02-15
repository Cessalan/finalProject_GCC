<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-02-11
 * Time: 1:29 PM
 */
session_start();
session_destroy() or die("FAILED");
header("Location: ../views/Login.php");
