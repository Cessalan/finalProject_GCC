<?php include("../inc/config.php"); ?>

<!-- Nav -->

<nav id="nav">
    <ul>
        <li><a href="../views/Home.php"><?php echo HOME?></a></li>
        <li> <a class="dropdown">Services</a>

            <ul>
                <li><a href="../views/Services.php"><?php echo OUR_SERVICES?></a></li>
                <li><a href="../views/Login.php"><?php echo MEMBERS?></a></li>
                <li>
                    <a href="#"><?php echo APPOINTMENT?></a>
                    <ul>
                        <li><a href="../views/Appointement.php"><?php echo TAKE?></a></li>
                        <li><a href="../views/Cancellation.php"><?php echo CANCEL?></a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="../views/Contact.php"><?php echo CONTACT?></a></li>
        <li>
            <form method="get" action="../controllers/Logout.php">

                <?php
                if(isset( $_SESSION['currentUserID'])|| isset( $_SESSION['currentAccount'])){
                    echo"<input type='submit' value='Déconnexion'>";
                }
                ?>

            </form>
        </li>
            <form class="lang_btn" method='get' action='' id='form_lang' >
                <select name='lang' onchange='changeLang();' style="background-color:#F0E68C">
                    <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >EN</option>
                    <option value='fr' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'fr'){ echo "selected"; } ?> >FR</option>
                </select>
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