<?php
global $hesk_settings, $hesklang;

// This guard is used to ensure that users can't hit this outside of actual HESK code
if (!defined('IN_SCRIPT')) {
    die();
}

/**
 * @var array $top_articles
 * @var array $latest_articles
 * @var array $service_messages
 */

$service_message_type_to_class = array(
    '0' => 'none',
    '1' => 'success',
    '2' => '',
    // Info has no CSS class
    '3' => 'warning',
    '4' => 'danger'
);

require_once(TEMPLATE_PATH . 'customer/util/alerts.php');
require_once(TEMPLATE_PATH . 'customer/util/kb-search.php');
require_once(TEMPLATE_PATH . 'customer/util/rating.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>
        <?php echo $hesk_settings['hesk_title']; ?>
    </title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/all.min.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/animate.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/stellarnav.min.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/pignose.calendar.min.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/fonts/stylesheet.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/style.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/responsive.css">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
        <?php outputSearchStyling(); ?>
    </style>

</head>

<body>
    <div id="preloader"></div>
    <header>
        <div class="header-container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="logo">
                        <a href="index.html" class="link"><img src="<?php echo HESK_PATH; ?>img/dumaslogo.png"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-3 col-sm-8 col-6">
                    <div class="main-menu stellarnav">
                        <ul>
                            <li><a href="#" class="smoothscroll">Beranda</a></li>
                            <li><a href="index.php?a=add">Kirim Aduan</a></li>
                            <li><a href="#" class="smoothscroll">Lihat Aduan</a></li>
                            <li><a href="#" class="smoothscroll">Statistik</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7 col-12 d-none d-md-block">
                    <div class="header-right">
                        <ul class="links">
                            <li><a href="#">ID</a></li>
                        </ul>
                        <div class="get-quote">
                            <a href="<?php echo $hesk_settings['admin_dir']; ?>/" class="link btn-style-1">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="hero-area">
        <div class="hero-bg-left"><img src="<?php echo HESK_PATH; ?>img/wan/hero-left-bg.png" alt=""></div>
        <div class="hero-bg-right"><img src="<?php echo HESK_PATH; ?>img/wan/hero-right-bg.png" alt=""></div>
        <div class="hero-dot-bg-1 wow bounceIn" data-wow-iteration="infinite" data-wow-duration="5.0s"
            data-wow-delay="1.0s"><img src="<?php echo HESK_PATH; ?>img/wan/hero-top-center-dot.png" alt=""></div>
        <div class="hero-dot-bg-2 wow bounceIn" data-wow-iteration="infinite" data-wow-duration="5.0s"
            data-wow-delay="2.0s"><img src="<?php echo HESK_PATH; ?>img/wan/hero-left-dot.png" alt=""></div>
        <div class="hero-dot-bg-3 wow bounceIn" data-wow-iteration="infinite" data-wow-duration="5.0s"
            data-wow-delay="3.0s"><img src="<?php echo HESK_PATH; ?>img/wan/hero-bottom-left-dot.png" alt=""></div>
        <div class="hero-banner wow fadeIn animated" data-wow-duration="1.0s" data-wow-delay="1.0s"><img
                class="item-bounce" src="<?php echo HESK_PATH; ?>img/wan/hero-banner.png" alt=""></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-12">
                    <div class="hero-content">
                        <p class="btn-style-outline-1 welcome">Selamat Datang di Dumas</p>
                        <h2 class="title"><span class="light">Empower <br> Your Business</span> Better & Faster.</h2>
                        <div class="start-video">
                            <a href="index.php?a=add"" class=" start btn-style-1 btn-hvr-anim-top">
                                <?php echo $hesklang['submit_ticket']; ?>
                            </a>
                            <a class="popup-youtube btn-ripple-out"
                                href="https://www.youtube.com/watch?v=QOtuX0jL85Y"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-area" id="_about">
        <div class="about-dot-bg-1 wow bounceIn" data-wow-iteration="infinite" data-wow-duration="5.0s"
            data-wow-delay="1.0s"><img src="<?php echo HESK_PATH; ?>img/wan/about-left-dot.png" alt=""></div>
        <div class="about-dot-bg-2 wow bounceIn" data-wow-iteration="infinite" data-wow-duration="5.0s"
            data-wow-delay="1.5s"><img src="<?php echo HESK_PATH; ?>img/wan/about-top-right-dot.png" alt=""></div>
        <div class="about-dot-bg-3 wow bounceIn" data-wow-iteration="infinite" data-wow-duration="5.0s"
            data-wow-delay="2.0s"><img src="<?php echo HESK_PATH; ?>img/wan/about-bottom-right-dot.png" alt=""></div>
        <div class="about-dot-bg-4 wow bounceIn" data-wow-iteration="infinite" data-wow-duration="5.0s"
            data-wow-delay="2.5s"><img src="<?php echo HESK_PATH; ?>img/wan/about-center-dot.png" alt=""></div>
        <div class="about-dot-bg-5 wow bounceIn" data-wow-iteration="infinite" data-wow-duration="5.0s"
            data-wow-delay="3.0s"><img src="<?php echo HESK_PATH; ?>img/wan/about-left-bottom-dot.png" alt=""></div>
        <div class="about-dot-bg-6 wow bounceIn" data-wow-iteration="infinite" data-wow-duration="5.0s"
            data-wow-delay="3.5s"><img src="<?php echo HESK_PATH; ?>img/wan/about-right-bottom-dot.png" alt=""></div>
        <div class="about-banner-contact wow fadeInRight" data-wow-duration="1.0s" data-wow-delay="0.5s"><img
                src="<?php echo HESK_PATH; ?>img/wan/about-contact-banner.png" alt=""></div>
        <div class="about-right-bg"><img src="<?php echo HESK_PATH; ?>img/wan/about-right-bg.png" alt=""></div>
        <div class="about-left-bg wow fadeInLeft" data-wow-duration="1.0s" data-wow-delay="0.5s"><img
                src="<?php echo HESK_PATH; ?>img/wan/about-left-banner.png" alt=""></div>
        <div class="about-top-plant wow fadeInLeft" data-wow-duration="1.0s" data-wow-delay="0.5s"><img
                src="<?php echo HESK_PATH; ?>img/wan/about-plant.png" alt=""></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-12">
                    <div class="section-title">
                        <h5 class="intro">About Us</h5>
                        <h2 class="title">A Team Of Passionate Designers & Developers From New York.</h2>
                    </div>
                </div>
            </div>
            <div class="about-banner wow fadeIn animated" data-wow-duration="1.0s" data-wow-delay="0.7s">
                <img src="<?php echo HESK_PATH; ?>img/wan/about-banner.png" alt="">
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-all-boxes">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12 wow fadeInUp animated" data-wow-delay="00ms"
                                data-wow-duration="1500ms">
                                <div class="about-box">
                                    <div class="icon-box">
                                        <span class="color-1 icon"
                                            style="background: url(<?php echo HESK_PATH; ?>/img/wan/about-icon-bg-1.png)"><i
                                                class="fal fa-laptop"></i></span>
                                    </div>
                                    <div class="content">
                                        <h2 class="name">UI/UX Design</h2>
                                        <p class="text">Landing Pages, User Flow, Wireframing, Prototyping, Mobile
                                            AppDesign, Web App</p>
                                    </div>
                                </div>
                                <div class="about-box">
                                    <div class="icon-box">
                                        <span class="color-2 icon"
                                            style="background: url(<?php echo HESK_PATH; ?>/img/wan/about-icon-bg-2.png)"><i
                                                class="fal fa-chart-line"></i></span>
                                    </div>
                                    <div class="content">
                                        <h2 class="name">Branding</h2>
                                        <p class="text">Landing Pages, User Flow, Wireframing, Prototyping, Mobile
                                            AppDesign, Web App</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12 wow fadeInUp animated" data-wow-delay="300ms"
                                data-wow-duration="1500ms">
                                <div class="about-box-martop80 mar-top-80"></div>
                                <div class="about-box">
                                    <div class="icon-box">
                                        <span class="color-3 icon"
                                            style="background: url(<?php echo HESK_PATH; ?>/img/wan/about-icon-bg-3.png)"><i
                                                class="fal fa-carrot"></i></span>
                                    </div>
                                    <div class="content">
                                        <h2 class="name">Web Design</h2>
                                        <p class="text">Landing Pages, User Flow, Wireframing, Prototyping, Mobile
                                            AppDesign, Web App</p>
                                    </div>
                                </div>
                                <div class="about-box">
                                    <div class="icon-box">
                                        <span class="color-4 icon"
                                            style="background: url(<?php echo HESK_PATH; ?>/img/wan/about-icon-bg-4.png)"><i
                                                class="fal fa-cube"></i></span>
                                    </div>
                                    <div class="content">
                                        <h2 class="name">Product Design</h2>
                                        <p class="text">Landing Pages, User Flow, Wireframing, Prototyping, Mobile
                                            AppDesign, Web App</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-12 d-flex align-items-center">
                    <div class="about-right-content section-title">
                        <h5 class="intro">Our Services</h5>
                        <h2 class="title">Grow Business <span class="bold">With Wan.</span></h2>
                        <p class="text">We’ve been working with some awesome teams around the world. </p>
                        <a href="#" class="quote btn-style-outline-1">Get A Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-area" id="_testimonial" style="background: url(<?php echo HESK_PATH; ?>img/wan/testimonial-bg.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-color: #f8fbff;">
        <div class="testimonial-right-banner wow fadeInRight" data-wow-duration="1.0s" data-wow-delay="0.5s"><img
                src="<?php echo HESK_PATH; ?>/img/wan/testimonial-right-banner.png" alt=""></div>
        <div class="testimoinal-left-banner wow fadeInLeft" data-wow-duration="1.0s" data-wow-delay="0.5s"><img
                src="<?php echo HESK_PATH; ?>/img/wan/testimonial-left-banner.png" alt=""></div>
        <div class="testimonial-bottom-line"><img src="<?php echo HESK_PATH; ?>/img/wan/testimonial-line-bg.png" alt="">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="testimonial-section-title section-title">
                        <h5 class="intro">Testimonials</h5>
                        <h2 class="title">Our Happy Clients Say’s About Us.</h2>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="testimonial-carousel owl-carousel">
                        <div class="single-testimonial">
                            <div class="rating-cause">
                                <ul class="rating">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                </ul>
                                <p class="cause">“ Design Quality “</p>
                            </div>
                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do veiusmod
                                tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercit ation ullamco laboris nisi ut aliquip ex ea commodo consequat nickita.
                            </p>
                            <div class="autor">
                                <div class="img"><img src="<?php echo HESK_PATH; ?>/img/wan/testimonial-author-1.png"
                                        alt=""></div>
                                <div class="info">
                                    <h4 class="name">Rosalina D. William</h4>
                                    <h6 class="desg">Founder, Google</h6>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <div class="rating-cause">
                                <ul class="rating">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                </ul>
                                <p class="cause">“ Design Quality “</p>
                            </div>
                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do veiusmod
                                tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercit ation ullamco laboris nisi ut aliquip ex ea commodo consequat nickita.
                            </p>
                            <div class="autor">
                                <div class="img"><img src="<?php echo HESK_PATH; ?>/img/wan/testimonial-author-2.png"
                                        alt=""></div>
                                <div class="info">
                                    <h4 class="name">Hiliam B Baldes</h4>
                                    <h6 class="desg">Founder, Google</h6>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <div class="rating-cause">
                                <ul class="rating">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                </ul>
                                <p class="cause">“ Design Quality “</p>
                            </div>
                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do veiusmod
                                tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercit ation ullamco laboris nisi ut aliquip ex ea commodo consequat nickita.
                            </p>
                            <div class="autor">
                                <div class="img"><img src="img/home1/testimonial-author-3.png" alt=""></div>
                                <div class="info">
                                    <h4 class="name">Rosalina D. William</h4>
                                    <h6 class="desg">Founder, Google</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <?php
    /*******************************************************************************
    The code below handles HESK licensing and must be included in the template.

    Removing this code is a direct violation of the HESK End User License Agreement,
    will void all support and may result in unexpected behavior.

    To purchase a HESK license and support future HESK development please visit:
    https://www.hesk.com/buy.php
    *******************************************************************************/
    $hesk_settings['hesk_license']('Qo8Zm9vdGVyIGNsYXNzPSJmb290ZXIiPg0KICAgIDxwIGNsY
    XNzPSJ0ZXh0LWNlbnRlciI+UG93ZXJlZCBieSA8YSBocmVmPSJodHRwczovL3d3dy5oZXNrLmNvbSIgY
    2xhc3M9ImxpbmsiPkhlbHAgRGVzayBTb2Z0d2FyZTwvYT4gPHNwYW4gY2xhc3M9ImZvbnQtd2VpZ2h0L
    WJvbGQiPkhFU0s8L3NwYW4+PGJyPk1vcmUgSVQgZmlyZXBvd2VyPyBUcnkgPGEgaHJlZj0iaHR0cHM6L
    y93d3cuc3lzYWlkLmNvbS8/dXRtX3NvdXJjZT1IZXNrJmFtcDt1dG1fbWVkaXVtPWNwYyZhbXA7dXRtX
    2NhbXBhaWduPUhlc2tQcm9kdWN0X1RvX0hQIiBjbGFzcz0ibGluayI+U3lzQWlkPC9hPjwvcD4NCjwvZ
    m9vdGVyPg0K', "\104", "a809404e0adf9823405ee0b536e5701fb7d3c969");
    /*******************************************************************************
    END LICENSE CODE
    *******************************************************************************/
    ?> -->

    <footer>
        <!-- <div class="footer-banner wow fadeIn" data-wow-duration="1.0s" data-wow-delay="0.5s"><img src="img/home1/footer-banner.png" alt=""></div> -->
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-3 col-12">
                        <div class="fta-logo">
                            <a href="index.html" class="link"><img src="img/dumaslogo.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="fba-social">
                            <p class="copyright">Copyright By PTIPD UIN Malang - 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->

    <!-- <script src="<?php echo TEMPLATE_PATH; ?>customer/js/jquery-3.5.1.min.js"></script> -->
    <script
        src="<?php echo TEMPLATE_PATH; ?>customer/js/hesk_functions.js?<?php echo $hesk_settings['hesk_version']; ?>"></script>
    <?php outputSearchJavascript(); ?>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/svg4everybody.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/selectize.min.js"></script>
    <script
        src="<?php echo TEMPLATE_PATH; ?>customer/js/app<?php echo $hesk_settings['debug_mode'] ? '' : '.min'; ?>.js?<?php echo $hesk_settings['hesk_version']; ?>"></script>

    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/jquery-ui.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/wow.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/owl.carousel.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/jquery.counterup.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/countdown.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/pignose.calendar.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/stellarnav.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/jquery.scrollUp.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/popper.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/bootstrap.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH; ?>customer/js/theme.js"></script>
</body>

</html>