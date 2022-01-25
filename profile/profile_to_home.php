<?php 
session_start();


if(isset($_SESSION["id"])){
    include("../connexion.php");
    $id = $_SESSION["id"];
     //passer données dans la session
    echo "hi";
  $requette1 = "SELECT * FROM etudiant where id_etudiant='$id' ";
  $resultat1 = mysqli_query($link, $requette1);
  $etudiant = mysqli_fetch_assoc($resultat1);

  $requette2 = "SELECT * FROM enseignant where id_enseignant='$id' ";
  $resultat2 = mysqli_query($link, $requette2);
  $enseignant = mysqli_fetch_assoc($resultat2);

  $requette3 = "SELECT * FROM administrateur where id_administrateur='1' ";
  $resultat3 = mysqli_query($link, $requette3);
  $admin = mysqli_fetch_assoc($resultat3);

  if ($etudiant['id_etudiant'] != false) {
    header("location: ../student/student/student.php");
  } elseif ($enseignant['id_enseignant'] != false) {
    header("location:../enseignant/accueil_enseignant.php");
  } elseif ($admin['id_administrateur'] != false) {
    header("location:../admin/accueil_admin.php");
  }


}
     
else{
    header("location:login.php");
}

?>
