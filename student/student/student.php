<?php
session_start();
if (isset($_SESSION['id'])) {
    include('../../connexion.php');

    $id_etudiant = $_SESSION['id'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $photo = $_SESSION['photo'];

    // trouver tous les stages
    $requetteStages = "SELECT * FROM stage WHERE id_etudiant = $id_etudiant";
    $resultatStages = mysqli_query($link, $requetteStages);
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
    <link rel="shortcut icon" href="../../assets/local_assets/images/logo.png" type="image/png">
    <title>Gestion Stages</title>

    <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
    <script src="student.js"></script>

    <link rel="stylesheet" href="../../main_style.css">
    <link rel="stylesheet" href="css/student_style.css">
    <link rel="stylesheet" href="css/nav_bar_style.css">
    <link rel="stylesheet" href="css/right_section_style.css">
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
                <li><a href="../student/student.php" class="nav_active">
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
            <div id="stages_container">
                <?php
                $stagesCount = 0;
                $stagesValideCount = 0;
                $stagesNotesCount = 0;

                while ($dataStages = mysqli_fetch_assoc($resultatStages)) {
                    $id_stage = $dataStages['id_stage'];
                    $intitule_sujet = $dataStages['intitule_sujet'];
                    $description_sujet = $dataStages['description_sujet'];
                    $duree = $dataStages['duree'];
                    $technologies = $dataStages['technologies'];
                    $premiere_version = $dataStages['premiere_version'];
                    $version_corrige = $dataStages['version_corrige'];
                    $presentation = $dataStages['presentation'];
                    $attestation_stage = $dataStages['attestation_stage'];
                    $fiche_evalution = $dataStages['fiche_evalution'];
                    $nom_encadrant = $dataStages['nom_encadrant'];
                    $prenom_encardrant = $dataStages['prenom_encardrant'];
                    $note_stage = $dataStages['note'];
                    $est_valide = $dataStages['est_valide'];
                    $type = $dataStages['type'];
                    $id_enseignant = $dataStages['id_enseignant'];
                    $id_entreprise = $dataStages['id_entreprise'];
                    $id_etudiant = $dataStages['id_etudiant'];
                    $prenom_binome = $dataStages['prenom_binome'];
                    $nom_binome = $dataStages['nom_binome'];
                    $photo_binome = $dataStages['photo_binome'];

                    if (isset($id_enseignant)) {
                        $requetteEnseignant = "SELECT * FROM enseignant WHERE id_enseignant = $id_enseignant";
                        $resultatEnseignant = mysqli_query($link, $requetteEnseignant);
                        $dataEnseignant = mysqli_fetch_assoc($resultatEnseignant);
                        if ($dataEnseignant != False) {
                            $nom_enseignant = $dataEnseignant['nom_enseignant'];
                            $photo_enseignant = $dataEnseignant['photo'];
                        }
                    } else {
                        $nom_enseignant = NULL;
                        $photo_enseignant = NULL;
                    }

                    // calculate progress stats
                    $stagesCount++;
                    $stagesNotesCount += $note_stage != NULL ? 1 : 0;
                    $stagesValideCount += $est_valide == 1 ? 1 : 0;
                    $progressValue = ($id_entreprise != NULL ? 10 : 0) + ($intitule_sujet != NULL ? 5 : 0) +
                        ($premiere_version != NULL ? 10 : 0) + ($version_corrige != NULL ? 10 : 0) +
                        ($presentation != NULL ? 10 : 0) + ($attestation_stage != NULL ? 5 : 0) +
                        ($fiche_evalution != NULL ? 5 : 0) + ($nom_encadrant != NULL ? 10 : 0) +
                        ($note_stage != NULL ? 10 : 0) + ($est_valide != NULL ? 10 : 0) +
                        ($id_enseignant != NULL ? 10 : 0) +
                        (($duree != NULL && $technologies != NULL) ? 5 : 0);
                ?>

                    <div class="card" onClick="window.open('../internship/internship.php?id_stage=<?php echo $id_stage ?>', '_self')">
                        <div class="card_header">
                            <div>
                                <p class="card_title"><?php echo $intitule_sujet ?></p>
                                <p class="card_subtitle"><?php echo $nom_enseignant == NULL ? "Pas encore encadré" : "Encadré par Pr. " . $nom_enseignant ?></p>
                            </div>

                            <!-- add button -->
                            <?php if ($note_stage == NULL && $est_valide != 1) { ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>
                            <?php } else if ($est_valide == 1 && $note_stage == NULL) { ?>
                                <p class="internship_note" style="color: #ff942e; background-color: #ff932e1e;">Validé</p>
                            <?php } else { ?>
                                <p class="internship_note" style="color: #ff942e; background-color: #ff932e1e;"><?php echo $note_stage ?> / 20</p>
                            <?php } ?>
                        </div>

                        <div class="card_main">
                            <p class="short_descirption"><?php echo $description_sujet ?></p>

                            <!-- progress bar -->
                            <div class="progress_container">
                                <p class="progress_header">Progress</p>
                                <div class="progress_bar">
                                    <span class="progress_indicator" style="width: <?php echo $progressValue ?>%; background-color: #ff942e"></span>
                                </div>
                                <p class="progress_percentage"><?php echo $progressValue ?>%</p>
                            </div>
                        </div>

                        <div class="card_footer">
                            <div class="participants">
                                <img src="<?php echo '../../assets/assets/images/' . ($photo == NULL ? 'inconnu.jpg' : $photo) ?>" alt="participant">
                                <?php if ($photo_binome != NULL) { ?><img src="<?php echo '../../assets/assets/images/' . ($photo_binome == NULL ? 'inconnu.jpg' : $photo_binome) ?>" alt="participant"><?php } ?>
                                <?php if ($photo_enseignant != NULL) { ?><img src="<?php echo '../../assets/assets/images/' . ($photo_enseignant == NULL ? 'inconnu.jpg' : $photo_enseignant) ?>" alt="participant"><?php } ?>
                                <button class="add_participant" style="color: #ff942e; background-color: #ff932e1e;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <path d="M12 5v14M5 12h14" />
                                    </svg>
                                </button>
                            </div>

                            <p class="internship_duration" style="color: #ff942e; background-color: #ff932e1e;"><?php echo $duree . " mois" ?></p>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>

            <?php
            if ($stagesCount == 0) { ?>
                <div class="empty_container">
                    <img src="../../assets/local_assets/svg/no_stage.svg" alt="empty" height="70%">
                </div>
            <?php } ?>
        </main>

        <!-- right side -->
        <aside id="right_side">
            <div id="hello_container" onClick="window.open('../../profile/profile.php', '_self')">
                <p>Bienvenue,<br><b><?php echo $prenom . ' ' . $nom ?></b></p>
                <img src="../../assets/assets/images/<?php echo $photo ?>" alt="user_icon">
            </div>

            <?php
            $_SESSION['stagesCount'] = $stagesCount;
            $_SESSION['stagesValideCount'] = $stagesValideCount;
            $_SESSION['stagesNotesCount'] = $stagesNotesCount;
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
</body>

</html>