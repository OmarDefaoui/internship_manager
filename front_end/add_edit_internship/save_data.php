<?php
session_start();
// temp
$_SESSION['id'] = 1;
if (isset($_SESSION['id']) && isset($_POST['enregistrer'])) {
    include('../../back_end/connexion.php');
    $id_etudiant = $_SESSION['id'];

    $isNew = $_POST['isNew'];
    $id_stage = $_POST['id_stage'];

    $intitule_sujet = $_POST['intitule_sujet'];
    $description_sujet = $_POST['description_sujet'];
    $duree = $_POST['duree'];
    $technologies = $_POST['techno_utilisees'];
    $premiere_version = $_POST['version_initial_rapport'];
    $version_corrige = $_POST['version_corrige_rapport'];
    $presentation = $_POST['presentation'];
    $attestation_stage = $_POST['attestation_stage'];
    $fiche_evalution = $_POST['fiche_evaluation'];
    $nom_encadrant = $_POST['nom_encadrant'];
    $prenom_encardrant = $_POST['prenom_encadrant'];
    $type = $_POST['type_stage'];
    $prenom_binome = $_POST['prenom_binome'];
    $nom_binome = $_POST['nom_binome'];
    $photo_binome = $_POST['photo_binome'];

    $id_entreprise = NULL;
    $nom_entreprise = $_POST['name'];
    $adresse_entreprise = $_POST['address'];
    $tel_entreprise = $_POST['phone'];
    $ville_entreprise = $_POST['city'];

    // get entreprise id
    if (
        $nom_entreprise != NULL && $adresse_entreprise != NULL &&
        $tel_entreprise != NULL && $ville_entreprise != NULL
    ) {
        $requette = "SELECT * FROM entreprise where nom='$nom_entreprise'
            and adresse='$adresse_entreprise' and tel='$tel_entreprise' 
            and ville='$ville_entreprise'";
        $resultat = mysqli_query($link, $requette);
        $data = mysqli_fetch_assoc($resultat);

        if ($data != False) {
            // use data from auto complete
            $id_entreprise = $data['id_entreprise'];
        } else {
            // insert new entreprise
            $requette = "INSERT INTO entreprise (nom,adresse,ville,tel) VALUES 
            ('$nom_entreprise','$adresse_entreprise','$ville_entreprise','$tel_entreprise')";
            $resultat = mysqli_query($link, $requette);

            $requette = "SELECT * FROM entreprise where nom='$nom_entreprise'
                and adresse='$adresse_entreprise' and tel='$tel_entreprise' 
                and ville='$ville_entreprise'";
            $resultat = mysqli_query($link, $requette);
            $id_entreprise = mysqli_fetch_assoc($resultat)['id_entreprise'];
        }
    }

    if ($isNew) {
        // stocker comme nouveau stage
        $requetteStage = "INSERT INTO stage 
            (intitule_sujet,
            description_sujet,
            duree,
            technologies,
            premiere_version,
            version_corrige,
            presentation,
            attestation_stage,
            fiche_evalution,
            nom_encadrant,
            prenom_encardrant,
            type,
            id_etudiant,
            prenom_binome,
            nom_binome,
            photo_binome,
            id_entreprise)
        VALUES 
            ('$intitule_sujet',
            '$description_sujet',
            '$duree',
            '$technologies',
            '$premiere_version',
            '$version_corrige',
            '$presentation',
            '$attestation_stage',
            '$fiche_evalution',
            '$nom_encadrant',
            '$prenom_encardrant',
            '$type',
            '$id_etudiant',
            '$prenom_binome',
            '$nom_binome',
            '$photo_binome',
            '$id_entreprise')";
        $resultatStage = mysqli_query($link, $requetteStage);
    } else {
        $requetteStage = "UPDATE stage SET  
            intitule_sujet = '$intitule_sujet',
            description_sujet = '$description_sujet',
            duree = '$duree',
            technologies = '$technologies',
            premiere_version = '$premiere_version',
            version_corrige = '$version_corrige',
            presentation = '$presentation',
            attestation_stage = '$attestation_stage',
            fiche_evalution = '$fiche_evalution',
            nom_encadrant = '$nom_encadrant',
            prenom_encardrant = '$prenom_encardrant',
            type = '$type',
            id_etudiant = '$id_etudiant',
            prenom_binome = '$prenom_binome',
            nom_binome = '$nom_binome',
            photo_binome = '$photo_binome',
            id_entreprise = '$id_entreprise'
        WHERE 
            id_stage = '$id_stage'";
        $resultatStage = mysqli_query($link, $requetteStage);
    }

    echo 'success';
} else {
    header("location:login.php");
}
