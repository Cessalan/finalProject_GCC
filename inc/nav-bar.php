<?php include("../inc/config.php");

?>
<!-- Nav -->
<nav id="nav">
    <ul>

        <li class="current"><a href="../views/Home.php">Home</a></li>
        <li> <a class="dropdown">Services</a>

            <ul>
                <li><a href="../views/Services.php">Nos services</a></li>
                <li><a href="../views/Login.php">Membres</a></li>

                <li>
                    <a href="#">Rendez-vous</a>
                    <ul>
                        <li><a href="../views/Appointement.php">Prendre rendez-vous</a></li>
                        <li><a href="#">Annuler</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="../views/Contact.php">Contact Us</a></li>
            <form class="lang_btn" method='get' action='' id='form_lang' >
                <select name='lang' onchange='changeLang();'>
                    <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >EN</option>
                    <option value='fr' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'fr'){ echo "selected"; } ?> >FR</option>
                </select>
            </form>
            <form method="get" action="../controllers/Logout.php">

                <?php
                if(isset( $_SESSION['currentUserID'])|| isset( $_SESSION['currentAccount'])){
                    echo"<input type='submit' value='Déconnexion'></>";
                }
                ?>

            </form>


    </ul>

</nav>

<!--<script>-->
<!--    window.onscroll = function() {myFunction()};-->
<!---->
<!--    var header = document.getElementById("nav");-->
<!--    var sticky = header.offsetTop;-->
<!---->
<!--    function myFunction() {-->
<!--        if (window.pageYOffset > sticky) {-->
<!--            header.classList.add("sticky");-->
<!--        } else {-->
<!--            header.classList.remove("sticky");-->
<!--        }-->
<!--    }-->
<!--</script>-->