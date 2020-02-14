<?php

require_once("../stripe-php-master/init.php");
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


$stripeDetails = array(
    "secretKey" => "sk_test_fttSx7PU1EoDZ9yhK3QTj0cx00ccfn9cjz",
    "publishableKey" => "pk_test_maFVZX8AxdhJl3nollGaWeJU00WrJrPO6D"
);

\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
?>
<script>
    function changeLang(){
        document.getElementById('form_lang').submit();
    }
</script>


