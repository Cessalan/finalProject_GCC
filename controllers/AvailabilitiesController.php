<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-24
 * Time: 6:37 PM
 */
session_start();
$filename="../DB/Availabilities.xml";
$availabilities=array();



$xml=simplexml_load_file($filename);

if(!empty($_GET['days'])){

    foreach($_GET['days'] as $val){

        foreach($xml as $week ){

                foreach($week as $day){


                        if($day->getName()==$val){
                            $day->addChild("employee",$_SESSION['currentAccount']);
                        }


            }
        }
    }

    $xml->asXML($filename);
}else{
    header("../views/Availability.php");
}


