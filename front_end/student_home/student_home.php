<?php
session_start();
// temp
$_SESSION['id'] = 1;
if (isset($_SESSION['id'])) {
    include('../../back_end/connexion.php');
    $id_etudiant = $_SESSION['id'];

    // temp [to be passed in session]
    $requetteEtudiant = "SELECT * FROM etudiant WHERE id_etudiant = $id_etudiant";
    $resultatEtudiant = mysqli_query($link, $requetteEtudiant);
    $dataEtudiant = mysqli_fetch_assoc($resultatEtudiant);
    $id_etudiant = $dataEtudiant['id_etudiant'];
    $prenom = $dataEtudiant['prenom'];
    $nom = $dataEtudiant['nom'];
    $email = $dataEtudiant['email'];
    $code = $dataEtudiant['code'];
    $photo = $dataEtudiant['photo'];

    // trouver tous les stages
    $requetteStages = "SELECT * FROM stage WHERE id_etudiant = $id_etudiant";
    $resultatStages = mysqli_query($link, $requetteStages);
} else {
    header("location:login.php");
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
    <script src="student_home.js"></script>

    <link rel="stylesheet" href="../main_style.css">
    <link rel="stylesheet" href="css/student_home_style.css">
    <link rel="stylesheet" href="css/nav_bar_style.css">
    <link rel="stylesheet" href="css/right_section_style.css">
</head>

<body>
    <!-- top nav bar -->
    <nav>
        <div id="logo_container">
            <img src="../assets/images/logo.png" alt="Logo" id="logo">
        </div>

        <div id="nav_center">
            <h2>Stages</h2>
            <div id="search_bar">
                <input type="text" name="search" placeholder="Rechercher">
                <img src="../assets/images/search.png" alt="search" class="rounded_icon_light">
            </div>
            <div id="add_button">
                <img src="../assets/images/add.png" alt="add" class="rounded_icon_dark">
                <p>Ajouter un stage</p>
            </div>
        </div>

        <div id="nav_right">
            <img src="../assets/images/chat.png" alt="chat" class="rounded_icon_dark">
            <img src="../assets/images/notification.png" alt="notifications" class="rounded_icon_dark">
        </div>
    </nav>

    <div id="content">
        <!-- left nav bar -->
        <aside id="left_side">
            <div id="left_navition">
                <li><a href="#" class="nav_active">
                        <div></div><img src="../assets/svg/home.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../assets/svg/more.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../assets/svg/share.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../assets/svg/about.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../assets/svg/settings.svg" alt="">
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
            <?php
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
                $note = $dataStages['note'];
                $est_validé = $dataStages['est_validé'];
                $type = $dataStages['type'];
                $id_enseignant = $dataStages['id_enseignant'];
                $id_entreprise = $dataStages['id_entreprise'];
                $id_etudiant = $dataStages['id_etudiant'];
                $prenom_binome = $dataStage['prenom_binome'];
                $nom_binome = $dataStage['nom_binome'];
                $photo_binome = $dataStage['photo_binome'];
                $photo_enseignant = '2.jpg';
                $photo_binome = NULL; ?>

                <div class="card">
                    <div class="card_header">
                        <div>
                            <p class="card_title"><?php echo $intitule_sujet ?></p>
                            <p class="card_subtitle"><?php echo $nom_encadrant == NULL ? "Pas encore encadré" : "Encadré par Pr. " . $nom_encadrant ?></p>
                        </div>

                        <!-- add button -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                    </div>

                    <div class="card_main">
                        <p class="short_descirption"><?php echo $description_sujet ?></p>

                        <!-- progress bar -->
                        <div class="progress_container">
                            <p class="progress_header">Progress</p>
                            <div class="progress_bar">
                                <span class="progress_indicator" style="width: 60%; background-color: #ff942e"></span>
                            </div>
                            <p class="progress_percentage">60%</p>
                        </div>
                    </div>

                    <div class="card_footer">
                        <div class="participants">
                            <img src="<?php echo '../../back_end/assets/images/' . ($photo == NULL ? 'inconnu.jpg' : $photo) ?>" alt="participant">
                            <?php if ($photo_binome != NULL) ?><img src="<?php echo '../../back_end/assets/images/' . ($photo_binome == NULL ? 'inconnu.jpg' : $photo_binome) ?>" alt="participant">
                            <?php if ($id_enseignant != NULL) { ?><img src="<?php echo '../../back_end/assets/images/' . ($photo_enseignant == NULL ? 'inconnu.jpg' : $photo_enseignant) ?>" alt="participant"><?php } ?>
                            <button class="add_participant" style="color: #ff942e; background-color: #ff932e1e;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>
                            </button>
                        </div>

                        <p class="internship_duration" style="color: #ff942e; background-color: #ff932e1e;"><?php echo $duree . " mois" ?></p>
                    </div>
                </div>

            <?php }
            ?>
        </main>

        <!-- right side -->
        <aside id="right_side">
            <div id="hello_container">
                <p>Bienvenue,<br><b><?php echo $prenom . ' ' . $nom ?></b></p>
                <img src="../assets/images/user_icon.png" alt="user_icon">
            </div>

            <div id="overview_container">
                <div class="overview">
                    <p class="overview_name">Projets :</p>
                    <b class="overview_data">167</b>
                </div>

                <div class="overview">
                    <p class="overview_name">Completed :</p>
                    <b class="overview_data">136</b>
                </div>

                <div class="overview">
                    <p class="overview_name">In Progress :</p>
                    <b class="overview_data">19</b>
                </div>

                <div class="overview">
                    <p class="overview_name">Overdue</p>
                    <b class="overview_data">12</b>
                </div>
            </div>

            <div id="activity_container">
                <p id="activity_title">Activity <b>Feed</b></p>
                <div id="feeds_container">
                    <div class="feed">
                        <img src="../assets/images/face1.png" alt="user_icon">
                        <div class="text_container">
                            <p class="content"><b>Mr. Hassan</b> a accepter de vous guider lors de votre stage</p>
                            <p class="time">3 mins ago</p>
                        </div>
                    </div>
                    <div class="feed">
                        <img src="../assets/images/face2.png" alt="user_icon">
                        <div class="text_container">
                            <p class="content"><b>Mr. Hassan</b> a accepter de vous guider lors de votre stage</p>
                            <p class="time">6 mins ago</p>
                        </div>
                    </div>
                </div>
                <a href="#" id="see_more">See more</a>
            </div>
        </aside>
    </div>
</body>

</html>