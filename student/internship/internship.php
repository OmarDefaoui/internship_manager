<?php
session_start();
// temp
$_SESSION['id'] = 1;
if (isset($_SESSION['id'])) {
    include('../../connexion.php');
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
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship</title>

    <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
    <script src="../student/student.js"></script>

    <link rel="stylesheet" href="../../main_style.css">
    <link rel="stylesheet" href="css/internship_style.css">
    <link rel="stylesheet" href="../student/css/nav_bar_style.css">
    <link rel="stylesheet" href="../student/css/right_section_style.css">
</head>

<body>
    <!-- top nav bar -->
    <nav>
        <div id="logo_container">
            <img src="../../assets/local_assets/images/logo.png" alt="Logo" id="logo">
        </div>

        <div id="nav_center">
            <h2>Stages</h2>
            <div id="search_bar">
                <input type="text" name="search" placeholder="Rechercher">
                <img src="../../assets/local_assets/images/search.png" alt="search" class="rounded_icon_light">
            </div>
            <div id="add_button">
                <img src="../../assets/local_assets/images/add.png" alt="add" class="rounded_icon_dark">
                <p>Ajouter un stage</p>
            </div>
        </div>

        <div id="nav_right">
            <img src="../../assets/local_assets/images/chat.png" alt="chat" class="rounded_icon_dark">
            <img src="../../assets/local_assets/images/notification.png" alt="notifications" class="rounded_icon_dark">
        </div>
    </nav>

    <div id="content">
        <!-- left nav bar -->
        <aside id="left_side">
            <div id="left_navition">
                <li><a href="#" class="nav_active">
                        <div></div><img src="../../assets/local_assets/svg/home.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../../assets/local_assets/svg/more.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../../assets/local_assets/svg/share.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../../assets/local_assets/svg/about.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../../assets/local_assets/svg/settings.svg" alt="">
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
            <form class="popup" action="save_data.php" method="post" enctype="multipart/form-data">
                <!-- header of the page -->
                <div class="header">
                    <h1>Ajouter / Modifier un stage</h1>
                    <p class="explication">Suivez ces 5 étapes pour compléter votre stage.</p>
                </div>

                <div class="container">
                    <div class="w-layout-grid form-grid">
                        <!-- left progress bar -->
                        <div class="column">
                            <div class="step-wrap">
                                <div class="counter-top">
                                    <div class="form-text-wrapper active-text-wrapper">
                                        <div class="display-small">Entreprise</div>
                                        <p class="paragraph-form">Informations</p>
                                    </div>
                                    <div class="form-circle circle-active"><img class="form-circle-active-img" src="../../assets/local_assets/images/entreprise.svg" loading="lazy" width="24" alt=""></div>
                                    <div class="check-symbol form-active"></div>
                                </div>

                                <div class="counter-centre">
                                    <div class="form-text-wrapper">
                                        <div class="display-small">Encadrant</div>
                                        <p class="paragraph-form">Informations</p>
                                    </div>
                                    <div class="form-circle"><img src="../../assets/local_assets/images/encadrant.svg" loading="lazy" width="24" alt=""></div>
                                    <div class="check-symbol"></div>
                                </div>

                                <div class="counter-centre">
                                    <div class="form-text-wrapper">
                                        <div class="display-small">Sujet</div>
                                        <p class="paragraph-form">Informations</p>
                                    </div>
                                    <div class="form-circle"><img src="../../assets/local_assets/images/sujet.svg" loading="lazy" width="24" alt=""></div>
                                    <div class="check-symbol"></div>
                                </div>

                                <div class="counter-centre">
                                    <div class="form-text-wrapper">
                                        <div class="display-small">Binôme</div>
                                        <p class="paragraph-form">Informations</p>
                                    </div>
                                    <div class="form-circle"><img src="../../assets/local_assets/images/binome.svg" loading="lazy" width="24" alt=""></div>
                                    <div class="check-symbol"></div>
                                </div>

                                <div class="step-line"></div>

                                <div class="counter-bottom">
                                    <div class="form-text-wrapper">
                                        <div class="display-small">Déposer</div>
                                        <p class="paragraph-form">Fichiers</p>
                                    </div>
                                    <div class="form-circle"><img src="../../assets/local_assets/images/deposer.svg" loading="lazy" width="24" alt=""></div>
                                    <div class="check-symbol"></div>
                                </div>
                            </div>
                        </div>

                        <!-- content in the right side -->
                        <div class="content">
                            <!-- content -->
                            <fieldset>
                                <div class="form-card">
                                    <div class="header">
                                        <p>Etape 1/5</p>
                                        <h2>Infos sur l'entreprise</h2>
                                        <p>Veuillez entrer les informations nécessaires pour compléter cette étape.</p>
                                    </div>

                                    <input class="text_input" type="text" name="name" id="nom_entreprise" placeholder="Nom de l'entreprise" value="<?php echo $nom_entreprise ?>">
                                    <input class="text_input" type="text" name="address" id="adresse_entreprise" placeholder="Adresse de l'entreprise" value="<?php echo $adresse_entreprise ?>">
                                    <input class="text_input" type="text" name="city" id="ville_entreprise" placeholder="Ville de l'entreprise" value="<?php echo $ville_entreprise ?>">
                                    <input class="text_input" type="tel" name="phone" id="tel_entreprise" placeholder="Numero de telephone" value="<?php echo $tel_entreprise ?>">
                                </div>
                                <input type="button" name="next" class="next action-button" value="Suivant" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="header">
                                        <p>Etape 2/5</p>
                                        <h2>Infos sur l'encadrant de l'entreprise</h2>
                                        <p>Veuillez entrer les informations nécessaires pour compléter cette étape.</p>
                                    </div>

                                    <input class="text_input" type="text" name="nom_encadrant" placeholder="Nom de l'encadrant" value="<?php echo $nom_encadrant ?>">
                                    <input class="text_input" type="text" name="prenom_encadrant" placeholder="Prenom de l'encadrant" value="<?php echo $prenom_encardrant ?>">
                                </div>
                                <input type="button" name="next" class="next action-button" value="Suivant" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Précédant" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="header">
                                        <p>Step 3/5</p>
                                        <h2>Infos sur le sujet</h2>
                                        <p>Veuillez entrer les informations nécessaires pour compléter cette étape.</p>
                                    </div>

                                    <input class="text_input" type="text" name="intitule_sujet" placeholder="Intitule du sujet" value="<?php echo $intitule_sujet ?>">
                                    <input class="text_input" type="text" name="description_sujet" placeholder="Description du sujet" value="<?php echo $description_sujet ?>">
                                    <input class="text_input" type="number" name="duree" placeholder="Duree du stage" value="<?php echo $duree ?>">
                                    <textarea class="text_input" name="techno_utilisees" cols="30" rows="1" placeholder="Technologies utilisees"><?php echo $technologies ?></textarea>

                                    <div class="type_stage_radio">
                                        <input type="radio" name="type_stage" id="type_stage_1" value="PFE" checked="checked">
                                        <input type="radio" name="type_stage" id="type_stage_2" value="PFA" <?php if ($type == 'PFA') echo "checked=\"checked\"" ?>>
                                        <label for="type_stage_1" class="type_stage type_stage_1">
                                            <div class="dot"></div>
                                            <span>PFE</span>
                                        </label>
                                        <label for="type_stage_2" class="type_stage type_stage_2">
                                            <div class="dot"></div>
                                            <span>PFA</span>
                                        </label>
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Suivant" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Précédant" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="header">
                                        <p>Step 4/5</p>
                                        <h2>Infos sur le binome</h2>
                                        <p>Veuillez entrer les informations nécessaires pour compléter cette étape.</p>
                                    </div>

                                    <input class="text_input" type="text" name="nom_binome" placeholder="Nom du binome" value="<?php echo $nom_binome ?>">
                                    <input class="text_input" type="text" name="prenom_binome" placeholder="Prenom du binome" value="<?php echo $prenom_binome ?>">
                                    <div class="input_upload_container" data-text="<?php echo ($photo_binome != NULL ? $photo_binome : "Photo du binome"); ?>">
                                        <input name="photo_binome" type="file" class="input_upload">
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Suivant" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Précédant" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="header">
                                        <p>Step 5/5</p>
                                        <h2>Deposer</h2>
                                        <p>Veuillez entrer les informations nécessaires pour compléter cette étape.</p>
                                    </div>

                                    <div class="input_upload_container" data-text="<?php echo ($premiere_version != NULL ? $premiere_version : "Version initial du rapport"); ?>">
                                        <input name="version_initial_rapport" type="file" class="input_upload">
                                    </div>
                                    <div class="input_upload_container" data-text="<?php echo ($version_corrige != NULL ? $version_corrige : "Vesrion corrige du rapport"); ?>">
                                        <input name="version_corrige_rapport" type="file" class="input_upload">
                                    </div>
                                    <div class="input_upload_container" data-text="<?php echo ($presentation != NULL ? $presentation : "Presentation"); ?>">
                                        <input name="presentation" type="file" class="input_upload">
                                    </div>
                                    <div class="input_upload_container" data-text="<?php echo ($attestation_stage != NULL ? $attestation_stage : "Attestation de stage"); ?>">
                                        <input name="attestation_stage" type="file" class="input_upload">
                                    </div>
                                    <div class="input_upload_container" data-text="<?php echo ($fiche_evalution != NULL ? $fiche_evalution : "La fiche d'evaluation"); ?>">
                                        <input name="fiche_evaluation" type="file" class="input_upload">
                                    </div>
                                </div>

                                <input type="hidden" name="isNew" value="<?php echo $isNew ?>">
                                <input type="hidden" name="id_stage" value="<?php echo ($id_stage != NULL ? $id_stage : 0) ?>">
                                <input type="hidden" name="id_enseignant" value="<?php echo ($id_enseignant != NULL ? $id_enseignant : -1) ?>">

                                <input type="submit" name="enregistrer" class="next action-button" value="Enregistrer">
                                <input type="button" name="previous" class="previous action-button-previous" value="Précédant" />
                            </fieldset>
                        </div>
                    </div>
                </div>
            </form>
        </main>

        <!-- right side -->
        <aside id="right_side">
            <div id="hello_container">
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
                <a href="#" id="see_more">See more</a>
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