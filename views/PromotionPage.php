<?php
include('../DB/DBManager.php');

$image = $_POST['pictures'];

$imgArray = array(
    "imgSelected"=> $image
);

$_SESSION['imgSession'] = serialize($imgArray);

echo "<h1>The Promotion has been added</h1>";
?>
<br> <a href='../views/Promotion.php'><h3>Go back to Promotion Page</h3></a>
