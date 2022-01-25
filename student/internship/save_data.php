<?php
session_start();

if (isset($_SESSION['id']) && isset($_POST['enregistrer'])) {
    include('../../connexion.php');
    
    $id_etudiant = $_SESSION['id'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $photo = $_SESSION['photo'];

    $isNew = $_POST['isNew'];
    $id_stage = $_POST['id_stage'];
    $id_enseignant = $_POST['id_enseignant'];

    $intitule_sujet = $_POST['intitule_sujet'];
    $description_sujet = $_POST['description_sujet'];
    $duree = $_POST['duree'];
    $technologies = $_POST['techno_utilisees'];
    $nom_encadrant = $_POST['nom_encadrant'];
    $prenom_encardrant = $_POST['prenom_encadrant'];
    $type = $_POST['type_stage'];
    $prenom_binome = $_POST['prenom_binome'];
    $nom_binome = $_POST['nom_binome'];

    $id_entreprise = NULL;
    $nom_entreprise = $_POST['name'];
    $adresse_entreprise = $_POST['address'];
    $tel_entreprise = $_POST['phone'];
    $ville_entreprise = $_POST['city'];

    // upload files
    $photo_binome = my_upload_file(
        'photo_binome',
        'binomes',
        array('png', 'jpeg', 'jpg'),
        $id_etudiant,
        'inconnu.jpg'
    );
    $premiere_version = my_upload_file(
        'version_initial_rapport',
        'versions_initials',
        array('pdf'),
        $id_etudiant,
        ''
    );
    $version_corrige = my_upload_file(
        'version_corrige_rapport',
        'versions_corriges',
        array('pdf'),
        $id_etudiant,
        ''
    );
    $presentation = my_upload_file(
        'presentation',
        'presentations',
        array('pdf', 'pptx'),
        $id_etudiant,
        ''
    );
    $attestation_stage = my_upload_file(
        'attestation_stage',
        'attestations_stages',
        array('pdf'),
        $id_etudiant,
        ''
    );
    $fiche_evalution = my_upload_file(
        'fiche_evaluation',
        'fiches_evaluations',
        array('pdf'),
        $id_etudiant,
        ''
    );


    // get entreprise id
    if (
        $nom_entreprise != NULL && $adresse_entreprise != NULL &&
        $tel_entreprise != NULL && $ville_entreprise != NULL
    ) {
        $requette = "SELECT * FROM entreprise where nom_entreprise='$nom_entreprise'
            and adresse='$adresse_entreprise' and tel='$tel_entreprise' 
            and ville='$ville_entreprise'";
        $resultat = mysqli_query($link, $requette);
        $data = mysqli_fetch_assoc($resultat);

        if ($data != False) {
            // use data from auto complete
            $id_entreprise = $data['id_entreprise'];
        } else {
            // insert new entreprise
            $requette = "INSERT INTO entreprise (nom_entreprise,adresse,ville,tel) VALUES 
            ('$nom_entreprise','$adresse_entreprise','$ville_entreprise','$tel_entreprise')";
            $resultat = mysqli_query($link, $requette);

            $requette = "SELECT * FROM entreprise where nom_entreprise='$nom_entreprise'
                and adresse='$adresse_entreprise' and tel='$tel_entreprise' 
                and ville='$ville_entreprise'";
            $resultat = mysqli_query($link, $requette);
            $data = mysqli_fetch_assoc($resultat);
            $id_entreprise = $data['id_entreprise'];
        }
    }

    // save data to db
    if ($isNew) {
        $creationDate = date("Y-m-d");

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
            id_entreprise,
            creation_date)
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
            '$id_entreprise',
            '$creationDate')";
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

        // notify techer that the student made a modification
        if ($id_enseignant != -1) {
            $notifDate = date("Y-m-d h:m:s");
            $notifMessage = "<b>$nom_etudiant $prenom_etudiant</b> a fait une motification sur son stage";

            // sender => 0: the sender is teacher; 1: the sender is student
            $requette = "INSERT INTO notification (content,date,id_enseignant,id_etudiant,sender)
                VALUES ('$notifMessage','$notifDate',$id_enseignant,$id_etudiant,1)";
            $resultat = mysqli_query($link, $requette);
        }
    }

    header('location: ../student/student.php');
} else {
    header("location: ../../index.php");
}

// upload file
function my_upload_file($var_name, $folder_name, $extensions_autorisees, $file_name, $default_file_name)
{
    if (isset($_FILES["$var_name"]) && $_FILES["$var_name"]['error'] == 0) {
        $dossier = "../../assets/assets/$folder_name/";
        $temp_name = $_FILES["$var_name"]['tmp_name'];
        if (!is_uploaded_file($temp_name)) {
            exit("le fichier est introuvable");
        }
        if ($_FILES["$var_name"]['size'] >= 10000000) {
            exit("Erreur, le fichier est volumineux");
        }
        $infosfichier = pathinfo($_FILES["$var_name"]['name']);
        $extension_upload = $infosfichier['extension'];

        $extension_upload = strtolower($extension_upload);
        if (!in_array($extension_upload, $extensions_autorisees)) {
            exit("Erreur, Extension du fichier non autorisée");
        }
        $nom_fichier = $file_name . "." . $extension_upload;
        if (!move_uploaded_file($temp_name, $dossier . $nom_fichier)) {
            exit("Probleme dans le telechargement du fichier, Ressayez");
        }
        $result_file_name = $nom_fichier;
    } else {
        $result_file_name = $default_file_name;
    }
    return $result_file_name;
}
