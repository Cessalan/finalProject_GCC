2
3
4
5
6

<?php
include_once("../DB/DBManager.php");
$conn = connection();
$sql_update="Update appointment SET status= 'disable' WHERE appointment_id = '".$_GET['del_id']."'";
$query = mysqli_query($conn, $sql_update) or die($conn->error);
header ("Location: CancellationController.php");
?>