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
        $fiche_evalution = "dsdklsd sdsds.pdf";
        $nom_encadrant = $dataStage['nom_encadrant'];
        $prenom_encardrant = $dataStage['prenom_encardrant'];
        $note = $dataStage['note'];
        $est_validé = $dataStage['est_validé'];
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
                $nom_entreprise = $dataEntreprise['nom'];
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
        $id_etudiant = NULL;
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
    <title>Add Edit Internship</title>

    <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
    <script src="../student_home/student_home.js"></script>

    <link rel="stylesheet" href="../main_style.css">
    <link rel="stylesheet" href="css/add_edit_internship_style.css">
    <link rel="stylesheet" href="../student_home/css/nav_bar_style.css">
    <link rel="stylesheet" href="../student_home/css/right_section_style.css">
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
            <form class="popup" action="save_data.php" method="post">
                <!-- header of the page -->
                <div class="header">
                    <h1>Example with Steps UI</h1>
                    <p class="explication">Follow the simple 5 steps to complete your mapping.</p>
                </div>

                <div class="container">
                    <div class="w-layout-grid form-grid">
                        <!-- left progress bar -->
                        <div class="column">
                            <div class="step-wrap">
                                <div class="counter-top">
                                    <div class="form-text-wrapper active-text-wrapper">
                                        <div class="display-small">Entreprise</div>
                                        <p class="paragraph-form">Browse and upload</p>
                                    </div>
                                    <div class="form-circle circle-active"><img class="form-circle-active-img" src="../assets/images/entreprise.svg" loading="lazy" width="24" alt=""></div>
                                    <div class="check-symbol form-active"></div>
                                </div>

                                <div class="counter-centre">
                                    <div class="form-text-wrapper">
                                        <div class="display-small">Encadrant</div>
                                        <p class="paragraph-form">Browse and upload</p>
                                    </div>
                                    <div class="form-circle"><img src="../assets/images/encadrant.svg" loading="lazy" width="24" alt=""></div>
                                    <div class="check-symbol"></div>
                                </div>

                                <div class="counter-centre">
                                    <div class="form-text-wrapper">
                                        <div class="display-small">Sujet</div>
                                        <p class="paragraph-form">Browse and upload</p>
                                    </div>
                                    <div class="form-circle"><img src="../assets/images/sujet.svg" loading="lazy" width="24" alt=""></div>
                                    <div class="check-symbol"></div>
                                </div>

                                <div class="counter-centre">
                                    <div class="form-text-wrapper">
                                        <div class="display-small">Binome</div>
                                        <p class="paragraph-form">Browse and upload</p>
                                    </div>
                                    <div class="form-circle"><img src="../assets/images/binome.svg" loading="lazy" width="24" alt=""></div>
                                    <div class="check-symbol"></div>
                                </div>

                                <div class="step-line"></div>

                                <div class="counter-bottom">
                                    <div class="form-text-wrapper">
                                        <div class="display-small">Deposer</div>
                                        <p class="paragraph-form">Browse and upload</p>
                                    </div>
                                    <div class="form-circle"><img src="../assets/images/deposer.svg" loading="lazy" width="24" alt=""></div>
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
                                        <p>Step 1/5</p>
                                        <h2>Infos sur l'entreprise</h2>
                                        <p>Please let us know what type of business decribes you.</p>
                                    </div>

                                    <input class="text_input" type="text" name="name" placeholder="Nom de l'entreprise" value="<?php echo $nom_entreprise ?>">
                                    <input class="text_input" type="text" name="address" placeholder="Adresse de l'entreprise" value="<?php echo $adresse_entreprise ?>">
                                    <input class="text_input" type="tel" name="phone" placeholder="Numero de telephone" value="<?php echo $tel_entreprise ?>">
                                    <input class="text_input" type="text" name="city" placeholder="Ville de l'entreprise" value="<?php echo $ville_entreprise ?>">
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="header">
                                        <p>Step 2/5</p>
                                        <h2>Infos sur l'encadrant dans l'entreprise</h2>
                                        <p>Please let us know what type of business decribes you.</p>
                                    </div>

                                    <input class="text_input" type="text" name="nom_encadrant" placeholder="Nom de l'encadrant" value="<?php echo $nom_encadrant ?>">
                                    <input class="text_input" type="text" name="prenom_encadrant" placeholder="Prenom de l'encadrant" value="<?php echo $prenom_encardrant ?>">
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="header">
                                        <p>Step 3/5</p>
                                        <h2>Infos sur le sujet</h2>
                                        <p>Please let us know what type of business decribes you.</p>
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
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="header">
                                        <p>Step 4/5</p>
                                        <h2>Infos sur le binome</h2>
                                        <p>Please let us know what type of business decribes you.</p>
                                    </div>

                                    <input class="text_input" type="text" name="nom_binome" placeholder="Nom du binome" value="<?php echo $nom_binome ?>">
                                    <input class="text_input" type="text" name="prenom_binome" placeholder="Prenom du binome" value="<?php echo $prenom_binome ?>">
                                    <div class="input_upload_container" data-text="<?php echo ($photo_binome != NULL ? $photo_binome : "Photo du binome"); ?>">
                                        <input name="photo_binome" type="file" class="input_upload">
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="header">
                                        <p>Step 5/5</p>
                                        <h2>Deposer</h2>
                                        <p>Please let us know what type of business decribes you.</p>
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

                                <input type="submit" name="enregistrer" class="next action-button" value="Enregistrer">
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
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

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="add_edit_internship.js"></script>
</body>

</html>