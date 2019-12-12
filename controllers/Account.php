<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2019-12-12
 * Time: 11:32 AM
 */
include('../DB/connection.php');


function getAccount($email,$password){
    $conn=connection();
    $sqlGetAccount="SELECT email,password FROM  account WHERE email='".$email."'and password='".$password."'";
    $result=$conn->query($sqlGetAccount);

    if($result->num_rows<1){
       echo"OUT";
    }else{
      echo"IN";
    }


}

function updateAccount(){

}
echo getAccount("Fatsyramp@gmail.com",'123');