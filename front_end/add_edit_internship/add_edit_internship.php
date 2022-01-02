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

    // trouver les information sur le stage voulu
    $requetteStage = "SELECT * FROM stage AS s 
        INNER JOIN enseignant AS es ON s.id_enseignant = es.id_enseignant
        INNER JOIN entreprise AS et ON s.id_entreprise = et.id_entreprise
        WHERE id_stage = 4";
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

    $nom_entreprise = $dataStage['nom'];
    $adresse_entreprise = $dataStage['adresse'];
    $ville_entreprise = $dataStage['ville'];
    $tel_entreprise = $dataStage['tel'];
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

    <link rel="stylesheet" href="../main_style.css">
    <link rel="stylesheet" href="css/add_edit_internship_style.css">
</head>

<body>
    <form class="popup" action="#" method="post">
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
                                <input type="radio" name="type_stage" id="type_stage_1" checked="checked">
                                <input type="radio" name="type_stage" id="type_stage_2" <?php if ($type == 'PFA') echo "checked=\"checked\"" ?>>
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
                        <input type="button" name="next" class="next action-button" value="Submit" />
                        <!-- <input type="submit" name="submit" value="Enregistrer"> -->
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>

                    <fieldset>
                        <div class="form-card">
                            <div class="header">
                                <p>Step 5/5</p>
                                <h2>Success</h2>
                                <p>Please let us know what type of business decribes you.</p>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </form>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="add_edit_internship.js"></script>
</body>

</html>