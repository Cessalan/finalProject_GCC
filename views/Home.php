<?php
include("../inc/header.php");

?>

<!-- Banner -->
<section id="banner">
    <article >
        <div class="image" data-position="center" >
            <img src="../assets/pictures/inside2.jpg" alt="" />
        </div>
        <div class="content">
            <h1 class="alt"><a href="#"><u>Le Garage Chemin Chambly</u></a></h1>
            <h2 class="alt">DESC_GARAGE</h2>
            <ul class="actions">
                <li><a href="../views/Services.php" class="button">EN_SAVOIR</a></li>
            </ul>
        </div>
    </article>

</section>


<!-- Two -->
<section id="two">
    <div class="carousel">

        <article>
            <img class="imgPosition" src="../assets/pictures/work.jpg" alt="" width="560" height="440"/>
            <div class="content">
                <h2>Expertise</h2>
                <p>EXPERTISE_TEXT</p>
            </div>
        </article>
        <article>
            <img class="imgPosition" src="../assets/pictures/tire_change2.jpg" alt="" width="560" height="440"/>
            <div class="content">
                <h2>PNEUS</h2>
                <p>PNEUS_TEXT</p>
            </div>
        </article>
        <nav>
            <a href="#" class="previous"><span class="label">PREVIOUS</span></a>
            <a href="#" class="next"><span class="label">NEXT</span></a>
        </nav>
    </div>


</section>

<!-- Three -->
<section id="three">
    <div class="wrapper style2 special">
        <div class="inner">
            <h2 class="alt">SUBSCRIPTION</h2>
            <p>SUBSCRIPTION_EMAIL</p>
            <form method="post" action="#" class="combined">
                <input type="email" name="email" id="email" placeholder="email" class="invert" />
                <input type="submit" class="special" value="SUBSCRIPTION_SUBMIT" />
            </form>
        </div>
    </div>
</section>

<!-- Footer -->
<section id="footer">
    <div class="wrapper style3">
        <div class="inner">
            <div>
                <header>
                    <h3>Question?</h3>
                </header>
                <p>
                    Si vous avez une quelquonce question à propos de nos services ou si vous avez
                    besoin de renseignements additionels, n' hesitez pas à nous contacter. Nous nous ferons
                    un plaisir de vous répondre.
                </p>

            </div>
            <div>
                <header>
                    <h3>CONTACT_US</h3>
                </header>
                <div class="contact-icons">
                    <ul>
                        <li><a class="icon fa-envelope"><span>garagecheminchambly@gmail.com</span></a></li>
                        <li><a href="https://www.facebook.com/pg/Chemin-Chambly-Auto-Service-128131274628393/about/" class="icon fa-facebook"><span>Garage Chemin Chambly</span></a></li>
                    </ul>
                    <ul>
                        <li><a href="#" class="icon fa-phone"><span>1(450) 647 2000</span></a></li>
                        <li>
                            <div class="icon fa-map-marker">
                                <address>

                                    2271 Chemin Chambly <br />
                                    Longueuil, QC J4J 3Z5<br />
                                    Canada
                                </address>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            &copy; Fatsy & Haroon
        </div>
    </div>
</section>
<?php
include(PREAMBLE.'inc/scripts.php');
?>
