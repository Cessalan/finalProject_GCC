<?php
session_start();

$image = $_POST['pictures'];

$imgArray = array(
    "imgSelected"=> $image
);

$_SESSION['imgSession'] = serialize($imgArray);
header("location:../views/Promotion.php?m=Votre nouvelle promotion a ete ajoute");
print_r($imgArray);