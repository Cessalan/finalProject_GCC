<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-02-18
 * Time: 2:52 PM
 */
session_start();
include("../DB/DBManager.php");
if(!isset($_SESSION['currentAccount'])||$_SESSION['currentAccount']!="fatsy"){
    header("location:../views/login.php");

}else{
        if(!empty($_POST['email']) && !empty($_POST['passConfirm']) && !empty($_POST['pass'])){

                if($_POST['passConfirm']== $_POST['pass']){

                    resetPassword($_POST['email'],$_POST['passConfirm']);
                }else{

                    header("location:../views/ResetAccount.php?m=Assurez vous que les mots de passe sont pareils.");
                }
        }else{
            header("location:../views/ResetAccount.php?m=Ne laissez aucune case vide");
        }
    header("location:../views/ResetAccount.php?box=Le mot de passe a ete change");
}
