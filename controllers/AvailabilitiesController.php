<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-24
 * Time: 6:37 PM
 */

include("../DB/DBManager.php");
$arr=array(
    "lundi"=>0,"mardi"=>0,"mercredi"=>0,"jeudi"=>0,"vendredi"=>0,"samedi"=>0,"dimanche"=>0

);




if(!empty($_GET['days'])){

    foreach($_GET['days'] as $choice){

        foreach($arr as $key=>$value){

            if($choice==$key){
                $arr[$key]=1;
            }

        }

    }

insertAvailabilities($_SESSION["currentUserID"],$arr);
   /* echo"CHOICE ";
    print_r($_GET['days']);
    echo "My ARRAY:" ;print_r($arr);*/
}else{
    header("../views/Availability.php");
}

$_SESSION["msgAv"]="Merci d'avoir envoye vos disponibilites";
header("location:../views/Availability.php");
