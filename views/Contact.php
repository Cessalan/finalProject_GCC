<?php
include("../inc/header.php");
?>

<div>
<div class="mapouter"><div class="gmap_canvas"><iframe width="800" height="550" id="gmap_canvas"
 src="https://maps.google.com/maps?q=2271%20Chambly%20Rd%2C%20Longueuil%2C%20Quebec%20J4J%203Z5&t=&z=15&ie=UTF8&iwloc=&output=embed"
frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.bitgeeks.net"></a></div>
<style>.mapouter{float:left;
        margin: 100px 20px 40px;
        height:550px;width:800px;}  .gmap_canvas
  {overflow:hidden;background:none!important;height:550px;width:800px;}</style></div>
<div>

<br>
    <h2><b><?php echo EQUIPE_SERVICE?></b></h2>


    <hr>
        <p id="Heures"><b><?php echo OPEN_HOURS?></b>
            <br><?php echo WEEKDAYS_DAYS . "<br> " . WEEKDAYS_TIME?>
            <br><?php echo WEEKEND_SATURDAY . "<br>" . WEEKEND_SUNDAY ?></p>

    <div class="icon fa-map-marker">
        <b><?php echo ADDRESS ?></b></br>
            2271 Chemin Chambly
            Longueuil, QC J4J 3Z5
            Canada
    </div>
    <a class="icon fa-phone"><span><b><?php echo TELEPHONE ?> </b><br>1(450) 647 2000</span></a><br>
    <a class="icon fa-envelope"><span><b> <?php echo COURRIEL ?> </b><br> garagecheminchambly@gmail.com</span></a><br>
    <b><?php echo SOCIAL ?></b> <br>
    <a href="https://www.facebook.com/pg/Chemin-Chambly-Auto-Service-128131274628393/about/" class="icon fa-facebook"><span> Garage Chemin Chambly</span></a>
   <br> <a href="https://www.instagram.com/garagecheminchambly/" class="icon fa-instagram"><span> Garage Chemin Chambly</span></a>

</div>
<?php
include(PREAMBLE.'inc/scripts.php');
?>
