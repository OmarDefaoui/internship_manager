<?php
include("../connexion.php");
if(isset($_POST['action'])){
    $stage_requette = "SELECT *FROM `stage`,etudiant,entreprise WHERE etudiant.id_etudiant=stage.id_etudiant and stage.id_entreprise=entreprise.id_entreprise and id_enseignant is not null  "; 
    if(isset($_POST['Ginfo'])){
        $stage_requette .="AND Filière='Informatique'";
    }

    if(isset($_POST['Gindus'])){
        $stage_requette .="AND Filière='Industrielle'";
    }
    if(isset($_POST['pfa'])){
        $stage_requette .="AND type='PFA'";
    }
    if(isset($_POST['pfe'])){
        $stage_requette .="AND type='PFE'";
    }
    $stage_resultat = mysqli_query($link,$stage_requette);
}
?>