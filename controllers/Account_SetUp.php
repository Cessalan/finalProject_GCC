<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-16
 * Time: 10:51 AM
 */

include('../DB/DBManager.php');
$email=$_SESSION['currentAccount'];

updateAccount($email,$_GET['fname'],$_GET['lname'],$_GET['telephone'],$_GET['address'],$_GET['zip']);

?>
<h2>Merci d'avoir mis à jour les informations de votre compte!</h2>

<br> <a href='../views/Login.php'>Retour a la page précédente</a>

