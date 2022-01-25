<?php
session_start();
include("../connexion.php");

$id = $_SESSION['id'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$photo = $_SESSION['photo'];
$email = $_SESSION['email'];
$profile = $_SESSION['profile'];


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
    <script src="../student/student/student.js"></script>

    <link rel="stylesheet" href="../main_style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="../student/student/css/nav_bar_style.css">
    <link rel="stylesheet" href="../student/student/css/right_section_style.css">

</head>

<body>
    <!-- top nav bar -->
    <nav>
        <div id="logo_container">
            <img src="../assets/local_assets/images/logo.png" alt="Logo" id="logo">
        </div>

        <div id="nav_center">
            <h2>Stages</h2>
            <div id="search_bar">
                <input type="text" name="search" placeholder="Rechercher">
                <img src="../assets/local_assets/images/search.png" alt="search" class="rounded_icon_light">
            </div>
        </div>

        <div id="nav_right">
            <img src="../assets/local_assets/images/conv.png" alt="chat" class="rounded_icon_dark">
            <img src="../assets/local_assets/images/notification.png" alt="notifications" class="rounded_icon_dark">
        </div>
    </nav>

    <div id="content">
        <!-- left nav bar -->
        <aside id="left_side">
            <div id="left_navition">

                <li><a href="#">

                        <div></div><img src="../assets/local_assets/svg/home.svg" alt="">
                    </a></li>
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.gestionstage.rf.gd/" target="_blank">
                        <div></div><img src="../assets/local_assets/svg/share.svg" alt="">
                    </a></li>
                <li><a href="../index.php">
                        <div></div><img src="../assets/local_assets/svg/about.svg" alt="">
                    </a></li>
                <li><a href="#" class="nav_active">
                        <div></div><img src="../assets/local_assets/svg/settings.svg" alt="">
                    </a></li>
                <li><a href="../deconnexion.php">
                        <div></div><img src="../assets/local_assets/svg/signout.svg" alt="">
                    </a></li>
            </div>
            <div id="modes">
                <p>Modes</p>
                <div id="mode_toggle">
                    <label>
                        <input class='toggle-checkbox' type='checkbox'></input>
                        <div class='toggle-slot'>
                            <div class='sun-icon-wrapper'>
                                <div class="iconify sun-icon" data-icon="feather-sun" data-inline="false"></div>
                            </div>
                            <div class='toggle-button'></div>
                            <div class='moon-icon-wrapper'>
                                <div class="iconify moon-icon" data-icon="feather-moon" data-inline="false"></div>
                            </div>
                        </div>
                    </label>
                </div>


            </div>
        </aside>

        <!-- main content -->
        <main>
            <div class="profile_container" style="width: 100%; height: 100%;">
                <iframe src="content.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
            </div>
        </main>

        <!-- right side -->
        <aside id="right_side">
            <div id="hello_container">
                <p>Bienvenue,<br><b><?php echo $prenom . ' ' . $nom ?></b></p>
                <img src="../assets/assets/images/<?php echo $photo ?>" alt="user_icon">
            </div>
        </aside>
    </div>
</body>

</html>