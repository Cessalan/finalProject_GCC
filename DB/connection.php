<?php
function connection(){

    $conn = new mysqli("127.0.0.1","root","","gcc");
    if($conn->error){
        echo $conn->error;
    }
    return $conn;
}


