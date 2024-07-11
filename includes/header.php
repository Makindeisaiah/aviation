<?php
include "includes/db.php";
include "includes/action.php";
?>
<header class="main-header">
            <nav class="main-menu">
                <div class="main-menu__wrapper">
                    <div class="main-menu__wrapper-inner">
                        <div class="main-menu__left">
                            <div class="main-menu__logo">
                                <a href="index.php"><img src="assets/images/resources/logo-1.png" alt=""></a>
                            </div>
                        </div>
                        <div class="main-menu__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class="dropdown megamenu">
                                    <a href="index.php">Home </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Pages</a>
                                    <ul class="shadow-box">
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="team.php">Team</a></li>
                                        <li><a href="destinations.php">Destinations</a></li>
                                        <li><a href="destination-details.php">Destination Details</a></li>
                                        <li><a href="testimonials.php">Testimonials</a></li>
                                        <li><a href="gallery.php">Gallery</a></li>
                                        <li><a href="faq.php">FAQs</a></li>
                                        <li><a href="404.php">404 Error</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Services</a>
                                    <ul class="shadow-box">
                                        <li><a href="services.php">Services</a></li>
                                        <!-- <li><a href="services-carousel.php">Service Carousel</a></li> -->
                                        <li><a href="business-charter.php">Business Charter</a></li>
                                        <li><a href="private-charter.php">Private Charter</a></li>
                                        <li><a href="jet-rentals.php">Jet Rentals</a></li>
                                        <li><a href="high-profile-people.php">High Profile People</a></li>
                                        <li><a href="music-tours.php">Music Tours</a></li>
                                        <li><a href="sports-teams.php">Sports Teams</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">News</a>
                                    <ul class="shadow-box">
                                        <li><a href="news.php">News</a></li>
                                        <li><a href="news-details.php">News Details</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.php">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="main-menu__right">
                            <div class="main-menu__search-cart-call-box">
                                <!-- <div class="main-menu__search-cart-box">
                                    <div class="main-menu__search-box">
                                        <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                                    </div>
                                </div> -->
                                <div class="main-menu__call">
                                <?php
                                    $users = $pdo->query("SELECT * FROM `users`");

                                    while ($row = $users->fetch()) {
                                    $first_name = $row['first_name'];
                                ?>
                                    <div class="main-menu__call-icon">
                                        <i class="fas fa-user"><a href="/login.php"></a></i>
                                    </div>
                                    <div class="main-menu__call-content">
                                        <!-- <p class="main-menu__call-sub-title">Call Anytime</p> -->
                                        <h5 class="main-menu__call-number"><a href="login.php"><?php echo $first_name ?></a></h5>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="main-menu__call">
                                    <div class="main-menu__call-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="main-menu__call-content">
                                        <p class="main-menu__call-sub-title">Call Anytime</p>
                                        <h5 class="main-menu__call-number"><a href="tel:7478926497">+747 892 6497</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>