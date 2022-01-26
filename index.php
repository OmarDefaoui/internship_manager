<?php
include('connexion.php');

$requette = "SELECT count(*) AS count FROM etudiant";
$resultat = mysqli_query($link, $requette);
$data = mysqli_fetch_assoc($resultat);
$studentsCount = $data['count'];

$requette = "SELECT count(*) AS count FROM enseignant";
$resultat = mysqli_query($link, $requette);
$data = mysqli_fetch_assoc($resultat);
$enseigantsCount = $data['count'];

$requette = "SELECT count(*) AS count FROM administrateur";
$resultat = mysqli_query($link, $requette);
$data = mysqli_fetch_assoc($resultat);
$adminsCount = $data['count'];
?>

<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/local_assets/images/logo.png" type="image/png">
    <title>Gestion Stages</title>

    <link rel="stylesheet" href="landing_page/css/animate.css">
    <link rel="stylesheet" href="landing_page/css/magnific-popup.css">
    <link rel="stylesheet" href="landing_page/css/LineIcons.css">
    <link rel="stylesheet" href="landing_page/css/font-awesome.min.css">
    <link rel="stylesheet" href="landing_page/css/bootstrap.min.css">
    <link rel="stylesheet" href="landing_page/css/default.css">
    <link rel="stylesheet" href="landing_page/css/style.css">

</head>

<body>
    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="assets/local_assets/images/logo.png" alt="Logo" width="50px" height="50px">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Accueil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">Caractéristiques</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">A propos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#facts">Pourquoi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#team">Equipe</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->

                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" data-scroll-nav="0" href="login/login.php">S'identifier</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        <div id="home" class="header-hero bg_cover" style="background-image: url(landing_page/images/banner-bg.svg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h3 class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                                Gestion des stages</h3>
                            <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
                                Commencer dès maintenant</h2>
                            <p class="text wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">
                                Au revoir au problèmes de gestion des stages, et bienvenue à la technologie
                            </p>
                            <a href="login/login.php" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s">
                                Se connecter
                            </a>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                            <img src="assets/local_assets/images/header-hero.png" alt="hero">
                        </div> <!-- header hero image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Conception épurée et simple, <span>
                                Livré avec tout ce que vous avez besoin pour vous simplifier la vie !
                            </span></h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="landing_page/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="landing_page/images/services-shape-1.svg" alt="shape">
                            <i class="lni-baloon"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Clair et simple</a></h4>
                            <p class="text">
                                Notre site est clair, toutes les fonctionnalités et les options sont bien définies et
                                très simples à utiliser
                            </p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="services-icon">
                            <img class="shape" src="landing_page/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="landing_page/images/services-shape-2.svg" alt="shape">
                            <i class="lni-cog"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Sécurisé</a></h4>
                            <p class="text">
                                Notre site assure et garantit la sécurité de vos informations et vos données. Donc vous
                                pouvez être à l'aise en travaillant avec
                            </p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="landing_page/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="landing_page/images/services-shape-3.svg" alt="shape">
                            <i class="lni-bolt-alt"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Moderne</a></h4>
                            <p class="text">
                                Notre site repond à tous les critères d'un site moderne et flexible, construit par les
                                nouvelles technologies
                            </p>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title"><span>Si vous êtes</span> un étudiant</h3>
                        </div> <!-- section title -->
                        <p class="text">
                            Notre site vous permet de trouver un encadrant académique pour votre stage, de communiquer
                            avec lui tout le temps afin d'assurer un bon accompagnement durant la période de votre stage
                        </p>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="assets/local_assets/images/capture_etudiant.png" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-shape-1">
            <img src="landing_page/images/about-shape-1.svg" alt="shape">
        </div>
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section class="about-area pt-70">
        <div class="about-shape-2">
            <img src="landing_page/images/about-shape-2.svg" alt="shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-last">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title"><span>Si vous êtes</span> un enseignant</span></h3>
                        </div> <!-- section title -->
                        <p class="text">
                            Notre site vous permet de choisir un étudiant et l'encadrer durant son stage, de suivre
                            son progrès continuellement, de communiquer avec lui au cas de besoin de conseil, ceci dans
                            le but de garantir la communication avec l'étudiant aussi bien que la bonne orientation
                        </p>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6 order-lg-first">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="assets/local_assets/images/capture_enseignant.png" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


    <!--====== ABOUT PART START ======-->

    <section class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title"><span>Si vous êtes</span> un administrateur</span></h3>
                        </div> <!-- section title -->
                        <p class="text">
                            Notre site vous permet de suivre les stages effectuées par les étudiants, les
                            enseignants qui les encadrent, ainsi que les entreprises dans lesquelles les étudiants
                            passent leurs stages.
                            Ceci vous permet de maitriser les stages au sein de votre établissement
                        </p>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="assets/local_assets/images/capture_admin.png" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-shape-1">
            <img src="landing_page/images/about-shape-1.svg" alt="shape">
        </div>
    </section>

    <!--====== ABOUT PART ENDS ======-->


    <!--====== ABOUT PART ENDS ======-->

    <!--====== VIDEO COUNTER PART START ======-->

    <section id="facts" class="video-counter pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-content mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img class="dots" src="landing_page/images/dots.svg" alt="dots">
                        <div class="video-wrapper">
                            <div class="video-image">
                                <img src="assets/local_assets/images/miniature.png" alt="video">
                            </div>
                            <div class="video-icon">
                                <a href="https://www.youtube.com/watch?v=PzKGNtaTe5M" class="video-popup"><i class="lni-play"></i></a>
                            </div>
                        </div> <!-- video wrapper -->
                    </div> <!-- video content -->
                </div>
                <div class="col-lg-6">
                    <div class="counter-wrapper mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="counter-content">
                            <div class="section-title">
                                <div class="line"></div>
                                <h3 class="title">Faits intéressants <span> à propos de ce site</span></h3>
                            </div> <!-- section title -->
                            <p class="text">
                                Notre site web est gratuit, open source, simple et moderne.<br>Qui peut étre utilisé par
                                n'importe quelle université au monde.
                            </p>
                        </div> <!-- counter content -->
                        <div class="row no-gutters">
                            <div class="col-4">
                                <div class="single-counter counter-color-1 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter"><?php echo $studentsCount ?></span></span>
                                        <p class="text">Etudiants</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-4">
                                <div class="single-counter counter-color-2 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter"><?php echo $enseigantsCount ?></span></span>
                                        <p class="text">Enseigants</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-4">
                                <div class="single-counter counter-color-3 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter"><?php echo $adminsCount ?></span></span>
                                        <p class="text">Administrateurs</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- counter wrapper -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== VIDEO COUNTER PART ENDS ======-->

    <!--====== TEAM PART START ======-->

    <section id="team" class="team-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section-title text-center pb-30">
                        <div class="line m-auto"></div>
                        <h3 class="title"><span>Rencontrez notre</span> créative membres d'équipe</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-7 col-sm-8">
                    <div class="single-team text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="team-image">
                            <img src="assets/local_assets/images/team-1.jpg" alt="Team">
                            <div class="social">
                                <ul>
                                    <li><a href="https://www.facebook.com/OmarDefaoui"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                                    <li><a href="https://www.instagram.com/omardefaoui/"><i class="lni-instagram-filled"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/omardefaoui/"><i class="lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content">
                            <h5 class="holder-name"><a href="#">Omar Defaoui</a></h5>
                            <p class="text">Développeur</p>
                            <br>
                        </div>
                    </div> <!-- single team -->
                </div>
                <div class="col-lg-3 col-md-7 col-sm-8">
                    <div class="single-team text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="team-image">
                            <img src="assets/local_assets/images/team-2.jpeg" alt="Team">
                            <div class="social">
                                <ul>
                                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-instagram-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content">
                            <h5 class="holder-name"><a href="#">Haytam Barik</a></h5>
                            <p class="text">Développeur</p>
                            <br>
                        </div>
                    </div> <!-- single team -->
                </div>
                <div class="col-lg-3 col-md-7 col-sm-8">
                    <div class="single-team text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="team-image">
                            <img src="assets/local_assets/images/team-3.jpeg" alt="Team">
                            <div class="social">
                                <ul>
                                    <li><a href="https://www.facebook.com/hassan.ayoub.5076798/"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                                    <li><a href="https://www.instagram.com/hassan_ayoub_benasser/"><i class="lni-instagram-filled"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/hassan-ayoub-benasser-1545a1212/"><i class="lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content">
                            <h5 class="holder-name"><a href="#">Hassan Ayoub<br>Benasser</a></h5>
                            <p class="text">Développeur</p>
                        </div>
                    </div> <!-- single team -->
                </div>
                <div class="col-lg-3 col-md-7 col-sm-8">
                    <div class="single-team text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="team-image">
                            <img src="assets/local_assets/images/team-4.jpg" alt="Team">
                            <div class="social">
                                <ul>
                                    <li><a href="https://web.facebook.com/saadoussama2016/"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                                    <li><a href="https://www.instagram.com/saadoussama1/"><i class="lni-instagram-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content">
                            <h5 class="holder-name"><a href="#">Oussama Saad</a></h5>
                            <p class="text">Développeur</p>
                            <br>
                        </div>
                    </div> <!-- single team -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEAM PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            <div class="footer-widget pb-200">
            </div>
        </div>
        <div id="particles-2"></div>
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART ENDS ======-->


    <!--====== Jquery js ======-->
    <script src="landing_page/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="landing_page/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Slick js ======-->
    <script src="landing_page/js/slick.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="landing_page/js/waypoints.min.js"></script>
    <script src="landing_page/js/jquery.counterup.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="landing_page/js/jquery.magnific-popup.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="landing_page/js/jquery.easing.min.js"></script>
    <script src="landing_page/js/scrolling-nav.js"></script>

    <!--====== wow js ======-->
    <script src="landing_page/js/wow.min.js"></script>

    <!--====== Particles js ======-->
    <script src="landing_page/js/particles.min.js"></script>

    <!--====== Main js ======-->
    <script src="landing_page/js/main.js"></script>

</body>

</html>