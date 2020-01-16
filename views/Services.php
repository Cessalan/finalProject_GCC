<?php
include("../inc/header.php");
?>
<section id="one">
    <div class="wrapper">
        <div class="posts inner">
            <div>
                <article>
                    <h2><?php echo SERVICE_INFO ?></h2><br>
                </article>
                <ul>
                    <?php
                    foreach(SERVICE_LIST as $value)
                    {
                        echo "<li> $value</li>";
                    }
                    ?>
                </ul>
            </div>

            <!--
             SERVICE_LIST
            -->
            <div>
                <article>
                    <img class="image fit" src="../assets/pictures/tool1.jpg" alt=""  />
                    <h3><?php
                        echo DETAILS_MECHANIQUE1
                        ?></h3>
                    <p><?php
                        echo DETAILS_MECHANIQUE1_TEXT
                        ?></p>

                </article>
                <article>
                    <img class="image fit" src="../assets/pictures/entretien-voiture.jpg" alt="" height="258"/>
                    <h3><?php
                        echo DETAILS_MECHANIQUE2
                        ?> </h3>
                    <p><?php
                        echo DETAILS_MECHANIQUE2_TEXT
                        ?></p>

                </article>
            </div>
            <div>
                <article>
                    <img class="image fit" src="../assets/pictures/tire_change.jpg" alt="" />

                    <h3><?php
                      echo DETAILS_MECHANIQUE3
                        ?> </h3>

                    <p><?php
                        echo DETAILS_MECHANIQUE3_TEXT
                        ?></p>
                </article>
                <article>
                    <img class="image fit" src="../assets/pictures/tools.jpg" alt="" />

                    <h3><?php
                        echo DETAILS_MECHANIQUE4
                        ?></h3>

                    <p><?php
                        echo DETAILS_MECHANIQUE4_TEXT
                        ?></p>
                </article>
            </div>
        </div>
    </div>
</section>

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
                    <h3>
                        <?php
                            echo CONTACT_US
                        ?>
                    </h3>
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
            &copy; Fatsy&Haroon
        </div>
    </div>
</section>
<?php
include(PREAMBLE.'inc/scripts.php');
?>
