<?php
session_start();

if (isset($_SESSION['profile'])) {
  $profile = $_SESSION['profile'];
  switch ($profile) {
    case 0:
      header("location: ../student/student/student.php");
      break;
    case 0:
      header("location:../enseignant/accueil_enseignant.php");
      break;
    case 0:
      header("location:../admin/accueil_admin.php");
      break;
    default:
      break;
  }
} else {
  header("location: ../index.php");
}
