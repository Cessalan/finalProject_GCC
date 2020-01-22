<?php
include("../inc/header.php");
include_once("../inc/config.php");
?>

<!-- Banner -->
<section id="banner">
    <article >
        <div class="image" data-position="center" >
            <img src="../assets/pictures/inside2.jpg" alt="" />
        </div>
        <div class="content">
            <h1 class="alt"><a href="#"><u><?php echo GARAGE_NAME?></u></a></h1>
            <h2 class="alt"><?php echo DESC_GARAGE?></h2>
            <ul class="actions">
                <li><a href="../views/Services.php" class="button"><?php echo EN_SAVOIR ?></a></li>
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
                <p><?php echo EXPERTISE_TEXT ?></p>
            </div>
        </article>
        <article>
            <img class="imgPosition" src="../assets/pictures/tire_change2.jpg" alt="" width="560" height="440"/>
            <div class="content">
                <h2><?php echo PNEUS ?></h2>
                <p><?php echo PNEUS_TEXT ?></p>
            </div>
        </article>
        <nav>
            <a href="#" class="previous"><span class="label"><?php echo PREVIOUS ?></span></a>
            <a href="#" class="next"><span class="label"><?php echo NEXT ?></span></a>
        </nav>
    </div>


</section>

<!-- Three -->
<section id="three">
    <div class="wrapper style2 special">
        <div class="inner">
            <h2 class="alt"><?php echo SUBSCRIPTION ?></h2>
            <p><?php echo SUBSCRIPTION_EMAIL ?> </p>
            <form method="get" action="../controllers/Subscriber_Add.php" class="combined">
                <input type="email" name="email" id="email" placeholder="<?php echo EMAIL ?>" class="invert" />
                <input type="submit" class="special" value="<?php echo SUBSCRIPTION_SUBMIT ?>" />
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
                    <?php
                    echo QUESTION_TEXT
                    ?>
                </p>

            </div>
            <div>
                <header>
                    <h3><?php echo CONTACT_US ?></h3>
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
