<?php
session_start();
/*unset($_SESSION['info2']);
unset($_SESSION['fullInfo']);*/
session_destroy();
header("location: ../views/Home.php");