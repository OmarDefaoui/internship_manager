<?php
session_start();

if (isset($_SESSION['id'])) {
    include('../../connexion.php');

    $id_etudiant = $_SESSION['id'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $photo = $_SESSION['photo'];

    if (isset($_GET['id_stage'])) {
        $isNew = False;
        $id_stage = $_GET['id_stage'];

        // trouver les information sur le stage voulu
        $requetteStage = "SELECT * FROM stage WHERE id_stage = $id_stage";
        $resultatStage = mysqli_query($link, $requetteStage);
        $dataStage = mysqli_fetch_assoc($resultatStage);

        $id_stage = $dataStage['id_stage'];
        $intitule_sujet = $dataStage['intitule_sujet'];
        $description_sujet = $dataStage['description_sujet'];
        $duree = $dataStage['duree'];
        $technologies = $dataStage['technologies'];
        $premiere_version = $dataStage['premiere_version'];
        $version_corrige = $dataStage['version_corrige'];
        $presentation = $dataStage['presentation'];
        $attestation_stage = $dataStage['attestation_stage'];
        $fiche_evalution = $dataStage['fiche_evalution'];
        $nom_encadrant = $dataStage['nom_encadrant'];
        $prenom_encardrant = $dataStage['prenom_encardrant'];
        $note = $dataStage['note'];
        $est_validé = $dataStage['est_valide'];
        $type = $dataStage['type'];
        $id_enseignant = $dataStage['id_enseignant'];
        $id_entreprise = $dataStage['id_entreprise'];
        $id_etudiant = $dataStage['id_etudiant'];
        $prenom_binome = $dataStage['prenom_binome'];
        $nom_binome = $dataStage['nom_binome'];
        $photo_binome = $dataStage['photo_binome'];

        if (isset($id_entreprise)) {
            $requetteEntreprise = "SELECT * FROM entreprise WHERE id_entreprise = $id_entreprise";
            $resultatEntreprise = mysqli_query($link, $requetteEntreprise);
            $dataEntreprise = mysqli_fetch_assoc($resultatEntreprise);
            if ($dataEntreprise != False) {
                $nom_entreprise = $dataEntreprise['nom_entreprise'];
                $adresse_entreprise = $dataEntreprise['adresse'];
                $ville_entreprise = $dataEntreprise['ville'];
                $tel_entreprise = $dataEntreprise['tel'];
            }
        } else {
            $nom_entreprise = NULL;
            $adresse_entreprise = NULL;
            $ville_entreprise = NULL;
            $tel_entreprise = NULL;
        }
    } else {
        $isNew = True;

        $id_stage = NULL;
        $intitule_sujet = NULL;
        $description_sujet = NULL;
        $duree = NULL;
        $technologies = NULL;
        $premiere_version = NULL;
        $version_corrige = NULL;
        $presentation = NULL;
        $attestation_stage = NULL;
        $fiche_evalution = NULL;
        $nom_encadrant = NULL;
        $prenom_encardrant = NULL;
        $note = NULL;
        $est_validé = NULL;
        $type = NULL;
        $id_enseignant = NULL;
        $id_entreprise = NULL;
        $prenom_binome = NULL;
        $nom_binome = NULL;
        $photo_binome = NULL;

        $nom_entreprise = NULL;
        $adresse_entreprise = NULL;
        $ville_entreprise = NULL;
        $tel_entreprise = NULL;
    }
} else {
    header("location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Manager</title>

    <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
    <script src="../student/student.js"></script>

    <link rel="stylesheet" href="../../main_style.css">
    <link rel="stylesheet" href="css/activity.css">
    <link rel="stylesheet" href="../student/css/nav_bar_style.css">
    <link rel="stylesheet" href="../student/css/right_section_style.css">
</head>

<body>
    <!-- top nav bar -->
    <nav>
        <div id="logo_container">
            <img src="../../assets/local_assets/images/logo.png" alt="Logo" id="logo" onClick="window.open('../student/student.php', '_self')">
        </div>

        <div id="nav_center">
            <h2>Stages</h2>
            <div id="search_bar">
                <input type="text" name="search" placeholder="Rechercher">
                <img src="../../assets/local_assets/images/search.png" alt="search" class="rounded_icon_light">
            </div>
            <div id="add_button" onClick="window.open('../internship/internship.php', '_self')">
                <img src="../../assets/local_assets/images/add.png" alt="add" class="rounded_icon_dark">
                <p>Ajouter un stage</p>
            </div>
        </div>

        <div id="nav_right">
            <img src="../../assets/local_assets/images/chat.png" alt="chat" class="rounded_icon_dark" onClick="window.open('../chat/chat.php', '_self')">
            <img src="../../assets/local_assets/images/notification.png" alt="notifications" class="rounded_icon_dark" onClick="window.open('../activity/activity.php', '_self')">
        </div>
    </nav>

    <div id="content">
        <!-- left nav bar -->
        <aside id="left_side">
            <div id="left_navition">
                <li><a href="#" class="nav_active">
                        <div></div><img src="../../assets/local_assets/svg/home.svg" alt="">
                    </a></li>
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://www.google.com/" target="_blank">
                        <div></div><img src="../../assets/local_assets/svg/share.svg" alt="">
                    </a></li>
                <li><a href="../../index.php">
                        <div></div><img src="../../assets/local_assets/svg/about.svg" alt="">
                    </a></li>
                <li><a href="../../profile/profile.php">
                        <div></div><img src="../../assets/local_assets/svg/settings.svg" alt="">
                    </a></li>
                <li><a href="../../deconnexion.php">
                        <div></div><img src="../../assets/local_assets/svg/signout.svg" alt="">
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
            <div id="activity_container">
                <p id="activity_title">Flux <b>d'activité</b></p>
                <div id="feeds_container">
                    <?php
                    $requetteNotif = "SELECT * FROM notification n,enseignant e WHERE id_etudiant='$id_etudiant'
                    AND sender=0 AND n.id_enseignant=e.id_enseignant";
                    $resultatNotif = mysqli_query($link, $requetteNotif);
                    while ($dataNotif = mysqli_fetch_assoc($resultatNotif)) {
                        $contentNotif = $dataNotif['content'];
                        $iconNotif = $dataNotif['photo'];

                        // calculate difference between 2 dates
                        $diff = abs(strtotime(date("Y-m-d")) - strtotime($dataNotif['date']));
                        $years = floor($diff / (365 * 60 * 60 * 24));
                        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                        $dateNotif = $years != 0 ? ($years . ' années') : ($months != 0 ? ($months . ' mois') : ($days . ' jours'));
                    ?>

                        <div class="feed">
                            <img src="../../assets/assets/images/<?php echo $iconNotif ?>" alt="user_icon">
                            <div class="text_container">
                                <p class="content"><?php echo $contentNotif ?></p>
                                <p class="time"><?php echo $dateNotif ?></p>
                            </div>
                        </div>

                    <?php }
                    ?>
                </div>
            </div>
        </main>

        <!-- right side -->
        <aside id="right_side">
            <div id="hello_container" onClick="window.open('../../profile/profile.php', '_self')">
                <p>Bienvenue,<br><b><?php echo $prenom . ' ' . $nom ?></b></p>
                <img src="../../assets/assets/images/<?php echo $photo ?>" alt="user_icon">
            </div>

            <?php
            $stagesCount = $_SESSION['stagesCount'];
            $stagesValideCount = $_SESSION['stagesValideCount'];
            $stagesNotesCount = $_SESSION['stagesNotesCount'];
            ?>
            <div id="overview_container">
                <div class="overview">
                    <p class="overview_name">Stages :</p>
                    <b class="overview_data"><?php echo $stagesCount ?></b>
                </div>

                <div class="overview">
                    <p class="overview_name">En cours :</p>
                    <b class="overview_data"><?php echo $stagesCount - $stagesNotesCount ?></b>
                </div>

                <div class="overview">
                    <p class="overview_name">Validés :</p>
                    <b class="overview_data"><?php echo $stagesValideCount ?></b>
                </div>

                <div class="overview">
                    <p class="overview_name">Notés :</p>
                    <b class="overview_data"><?php echo $stagesNotesCount ?></b>
                </div>
            </div>

            <div id="activity_container">
                <p id="activity_title">Flux <b>d'activité</b></p>
                <div id="feeds_container">
                    <?php
                    $requetteNotif = "SELECT * FROM notification n,enseignant e WHERE id_etudiant='$id_etudiant'
                    AND sender=0 AND n.id_enseignant=e.id_enseignant LIMIT 2";
                    $resultatNotif = mysqli_query($link, $requetteNotif);
                    while ($dataNotif = mysqli_fetch_assoc($resultatNotif)) {
                        $contentNotif = $dataNotif['content'];
                        $iconNotif = $dataNotif['photo'];

                        // calculate difference between 2 dates
                        $diff = abs(strtotime(date("Y-m-d")) - strtotime($dataNotif['date']));
                        $years = floor($diff / (365 * 60 * 60 * 24));
                        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                        $dateNotif = $years != 0 ? ($years . ' années') : ($months != 0 ? ($months . ' mois') : ($days . ' jours'));
                    ?>

                        <div class="feed">
                            <img src="../../assets/assets/images/<?php echo $iconNotif ?>" alt="user_icon">
                            <div class="text_container">
                                <p class="content"><?php echo $contentNotif ?></p>
                                <p class="time"><?php echo $dateNotif ?></p>
                            </div>
                        </div>

                    <?php }
                    ?>
                </div>
                <a href="../activity/activity.php" id="see_more">See more</a>
            </div>
        </aside>
    </div>

    <!-- For Entreprise nom auto complete -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
    <script src="internship.js"></script>

</body>

</html>