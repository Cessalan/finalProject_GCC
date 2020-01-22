<?php
session_start();

// Set Language variable
if(isset($_GET['lang']) && !empty($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];
}

// Include Language file
if(isset($_SESSION['lang']) && $_SESSION['lang'] == "fr"){
    include_once("../assets/lang/lang_fr.php");

}
else{
    include_once("../assets/lang/lang_en.php");
}
?>
<script>
    function changeLang(){
        document.getElementById('form_lang').submit();
    }
</script>


