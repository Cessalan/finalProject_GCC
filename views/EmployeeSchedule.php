<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-29
 * Time: 11:01 PM
 */

include('../DB/DBManager.php');

function getEmp(){
    $list="";
    $employees=getAccountList();
    foreach($employees as $rec){
        if($rec["lname"]!="") $display=$rec["lname"]; else $display=$rec["email"];


        $list.="<option value='".$rec["id"]."'>";
        $list.=$display;
        $list.="</option>";

    }

    return $list;


}

if(isset($_GET['m'])){
    echo '<script language="javascript">';
    echo 'alert("'.$_GET['m'].'")';
    echo '</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/c.ss-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<header id="header">
    <?php
    include("../inc/header.php");?>
</header>
    <div class="container-login100">

            <div class="container-login100">
                <div class="wrap-login100">
                    <div >
                        <?php echo getAvailabilities() ?>
                    </div>

            <div>
                <form  class="login100-form validate-form" action="../controllers/ScheduleMakerController.php" method="GET">

                    <h3>  <b>Jour:    </b> <br> <input type="date" id="date"  name="date" required> </h3>
                    <label>Employée 1</label>
                    <select name="emp1" required>
                        <?php echo getEmp()?>
                    </select><br>

                    <label>Employée 2</label>
                    <select name="emp2" required>
                        <?php echo getEmp()?>
                    </select><br>

                    <label >Employée 3</label>
                    <select name="emp3" required >
                        <?php echo getEmp()?>
                    </select><br>

                    <label>Employée 4</label>
                    <select name="emp4" required>
                        <?php echo getEmp()?>
                    </select>
                    <br>
                    <a href="../views/Admin.php"><input type="button" value="🢀"  /></a>
                    <input type="submit" value="Sauvegarder"> <br><br>
                    <a href="../views/ViewWeeklySchedule.php"><input type="button" value="Voir Horaire General"></a>

                </form>

            </div>

        </div>
    </div>


<div><!--===============================================================================================-->
    <script src="../assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="../assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/login/vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <?php
    include(PREAMBLE . 'inc/scripts.php');
    ?>
</div>

</html>