<!DOCTYPE HTML>

<html lang="fr">
<?php
session_start();
define('PREAMBLE', '../');
include(PREAMBLE.'inc/head.php');?>


<!-- Header -->
<header id="header">
    <!-- Logo -->
    <a class="logo" href="../views/Home.php"><img src="../assets/pictures/logo_yellow.png"></a>
    <?php include(PREAMBLE.'inc/nav-bar.php');?>
</header>
<body class ="is-preload">

<?php include_once("../inc/config.php");?>