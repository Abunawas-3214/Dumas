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
    <link rel="shortcut icon" type="image/png" href="<?php echo HESK_PATH; ?>img/favicon/favicon.png">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
        /* <?php outputSearchStyling(); ?>
        */ @font-face {
            font-family: "Font Awesome 5 Pro";
            font-style: normal;
            font-weight: 300;
            font-display: auto;
            src: url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-light-300.eot);
            src: url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-light-300.eot?#iefix) format("embedded-opentype"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-light-300.woff2) format("woff2"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-light-300.woff) format("woff"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-light-300.ttf) format("truetype"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-light-300.svg#fontawesome) format("svg")
        }

        @font-face {
            font-family: "Font Awesome 5 Pro";
            font-style: normal;
            font-weight: 400;
            font-display: auto;
            src: url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-regular-400.eot);
            src: url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-regular-400.eot?#iefix) format("embedded-opentype"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-regular-400.woff2) format("woff2"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-regular-400.woff) format("woff"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-regular-400.ttf) format("truetype"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-regular-400.svg#fontawesome) format("svg")
        }

        @font-face {
            font-family: "Font Awesome 5 Pro";
            font-style: normal;
            font-weight: 900;
            font-display: auto;
            src: url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-solid-900.eot);
            src: url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-solid-900.eot?#iefix) format("embedded-opentype"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-solid-900.woff2) format("woff2"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-solid-900.woff) format("woff"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-solid-900.ttf) format("truetype"), url(<?php echo TEMPLATE_PATH; ?>customer/fonts/fa-solid-900.svg#fontawesome) format("svg")
        }
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
                            <li><a href="ticket.php">Lihat Aduan</a></li>
                            <li><a href="#" class="smoothscroll">Statistik</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7 col-12 d-none d-md-block">
                    <div class="header-right">
                        <ul class="links">
                            <li><a href="#">ID</a></li>
                            <li><a href="#">EN</a></li>
                        </ul>
                        <div class="get-quote">
                            <a href="<?php echo $hesk_settings['admin_dir']; ?>/" class="link btn-style-1">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Floating button -->

    <a href="https://wa.me/62816561337" class=" btn-float">
        <span class="fa fa-phone item-float" aria-hidden="true"></span>
    </a>

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
                        <h2 class="title"><span class="light">Portal Layanan dan Pengaduan <br> </span> UIN Malang.
                        </h2>
                        <div class="start-video">
                            <a href="knowledgebase.php" style=" overflow: hidden;"
                                class=" start btn-style-1 btn-hvr-anim-top">
                                Cari Panduan Layanan
                            </a>
                            <a href="#ticketModal"" class=" start btn-style-outline-2" data-toggle="modal"
                                data-traget="#ticketModal">
                                Kirim Aduan
                            </a>
                            <!-- <a href="#" class="quote btn-style-outline-1">Kirim Aduan</a>  -->
                            <a class="popup-youtube btn-ripple-out" href="https://www.youtube.com/watch?v=QOtuX0jL85Y"
                                style="overflow: hidden;"><i class="fas fa-play"></i></a>
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
                        <h5 class="intro">Tentang</h5>
                        <h2 class="title">DUMAS (Pengaduan Masyarakat) adalah portal pelayanan seputar UIN Malang
                            .</h2>
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
                                        <h2 class="name">Pusat Layanan</h2>
                                        <p class="text">Anda dapat mencari informasi layanan dan mengajukan Aduan</p>
                                    </div>
                                </div>
                                <div class="about-box">
                                    <div class="icon-box">
                                        <span class="color-2 icon"
                                            style="background: url(<?php echo HESK_PATH; ?>/img/wan/about-icon-bg-2.png)"><i
                                                class="fal fa-chart-line"></i></span>
                                    </div>
                                    <div class="content">
                                        <h2 class="name">Statistik</h2>
                                        <p class="text">Informasi terkait statistik aduan dan tanggapan yang
                                            terselesaikan</p>
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
                                                class="fal fa-paper-plane"></i></span>
                                    </div>
                                    <div class="content">
                                        <h2 class="name">Email Balasan</h2>
                                        <p class="text">Jawaban dari aduan akan dikonfirmasi via email</p>
                                    </div>
                                </div>
                                <div class="about-box">
                                    <div class="icon-box">
                                        <span class="color-4 icon"
                                            style="background: url(<?php echo HESK_PATH; ?>/img/wan/about-icon-bg-4.png)"><i
                                                class="fal fa-bookmark"></i></span>
                                    </div>
                                    <div class="content">
                                        <h2 class="name">Rekam Jejak</h2>
                                        <p class="text">Aduan yang pernah terkirim dapat dilihat kembali melaui fitur
                                            lihat aduan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-12 d-flex align-items-center">
                    <div class="about-right-content section-title">
                        <h5 class="intro">Fitur</h5>
                        <h2 class="title">Temukan di <span class="bold">Dumas.</span></h2>
                        <p class="text">Kamu dapat menemukan seluruh panduan dasar dan informasi layanan di UIN
                            Malang dengan
                            Dumas. </p>
                        <a href="knowledgebase.php" class="quote btn-style-outline-1">Daftar Panduan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->

    <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Aduan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="h1">Sebelum anda menambahkan aduan, pastikan anda telah melihat Daftar Panduan dari
                        layanan yang anda
                        cari. Apabila anda tidak menemukan aduan anda di daftar panduan, anda bisa mengirimkan aduan
                        baru sesuai kategori yang tersedia</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-warning" onclick=" window.location.href='knowledgebase.php'
                        ;">Lihat Daftar Panduan</button>
                    <button type="button" class="btn btn-primary"
                        onclick="window.location.href='index.php?a=add';">Kirim Aduan</button>
                </div>
            </div>
        </div>
    </div>
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
                    <div class="col-lg-4 col-sm-3">
                        <div class="fta-logo">
                            <a href="index.html" class="link"><img src="img/dumaslogo.png"></a>
                        </div>
                    </div>
                    <div class="col-lg-7 offset-sm-1 col-sm-9 col-12">
                        <div class="fta-menu">
                            <img src="<?php echo HESK_PATH; ?>/img/sponsor/AunQa.png" />
                            <img src="<?php echo HESK_PATH; ?>/img/sponsor/blu.png" />
                            <img src="<?php echo HESK_PATH; ?>/img/sponsor/banpt.png" />
                            <img src="<?php echo HESK_PATH; ?>/img/sponsor/jaz.png" />
                            <img src="<?php echo HESK_PATH; ?>/img/sponsor/msciso9001.png" />
                            <img src="<?php echo HESK_PATH; ?>/img/sponsor/pusaka.png" />
                            <img src="<?php echo HESK_PATH; ?>/img/sponsor/kampusmerdeka.png" />
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
                            <p class="copyright">Powered By PTIPD UIN Malang - 2023</p>
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