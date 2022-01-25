<?php
session_start();
include('../connexion.php');

$wrongAccout = false;

if (isset($_POST['login'])) {
  $email = $_POST['username'];
  $pass = $_POST['passe'];

  $requette1 = "SELECT * FROM etudiant where email='$email' and code='$pass'";
  $resultat1 = mysqli_query($link, $requette1);
  $etudiant = mysqli_fetch_assoc($resultat1);

  $requette2 = "SELECT * FROM enseignant where email='$email' and code='$pass'";
  $resultat2 = mysqli_query($link, $requette2);
  $enseignant = mysqli_fetch_assoc($resultat2);

  $requette3 = "SELECT * FROM administrateur where email='$email' and code='$pass'";
  $resultat3 = mysqli_query($link, $requette3);
  $admin = mysqli_fetch_assoc($resultat3);

  if ($etudiant != false) {

    $_SESSION['id'] = $etudiant['id_etudiant'];
    $_SESSION['nom'] = $etudiant['nom'];
    $_SESSION['prenom'] = $etudiant['prenom'];
    $_SESSION['photo'] = $etudiant['photo'];
    $_SESSION['email'] = $etudiant['email'];
    $_SESSION['code'] = $etudiant['code'];
    $_SESSION['profile'] = 0;
    if ($pass == 'azerty') {
      header("location: ../profile/profile.php");
    } else {
      header("location: ../student/student/student.php");
    }
  } elseif ($enseignant != false) {

    $_SESSION['id'] = $enseignant['id_enseignant'];
    $_SESSION['nom'] = $enseignant['nom_enseignant'];
    $_SESSION['prenom'] = $enseignant['prenom_enseignant'];
    $_SESSION['photo'] = $enseignant['photo'];
    $_SESSION['email'] = $enseignant['email'];
    $_SESSION['code'] = $enseignant['code'];
    $_SESSION['profile'] = 1;
    if ($pass == 'azerty') {
      header("location: ../profile/profile.php");
    } else {
      header("location:../enseignant/accueil_enseignant.php");
    }
  } elseif ($admin != false) {
    $_SESSION['id'] = $admin['id_administrateur'];
    $_SESSION['nom'] = $admin['nom'];
    $_SESSION['prenom'] = $admin['prenom'];
    $_SESSION['photo'] = $admin['photo'];
    $_SESSION['email'] = $admin['email'];
    $_SESSION['code'] = $admin['code'];
    $_SESSION['profile'] = 2;
    if ($pass == 'azerty') {
      header("location: ../profile/profile.php");
    }
  } else {
    $wrongAccout = true;
  }
}

mysqli_close($link);
?>

<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/monstyle.css">

  <link rel="shortcut icon" href="../assets/local_assets/images/logo.png" type="image/png">
  <title>Gestion Stages</title>

</head>

<body>
  <div class="main">
    <div class="navbar">
      <div class="menu">
        <ul>
          <li><a href="#">ACCEUIL</a></li>
          <li><a href="../index.php">A PROPOS</a></li>
          <li><a href="../index.php">SERVICES</a></li>
          <li id="aa"><a href="mailto: omar.defaoui@uit.ac.ma">NOUS CONTACTEZ</a></li>
          <li><a href="../index.php">UTILISATION</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="../assets/local_assets/svg/login_illustration.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3>S'identifier</h3>
                <p class="mb-4">Veuillez se connecter avec votre mail institutionnelle pour y-accéder.</p>
              </div>

              <form id="form" action="#" method="post">
                <div class="form-group first">
                  <label for="username">Identifiant</label>
                  <input type="text" name="username" class="form-control" id="username">

                </div>
                <div class="form-group last mb-4">
                  <label for="password">Mot de passe</label>
                  <input type="password" name="passe" class="form-control" id="password">

                </div>

                <p style="color: red; margin-top: 0px;"><?php if ($wrongAccout) echo '* Identifiant ou mot de passe incorrecte.' ?></p>

                <div class="d-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-0"><span class="caption">Se rappeler de moi</span>
                    <input type="checkbox" checked="checked" />
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Mot de passe oublié</a></span>
                </div>

                <input id="log" type="submit" name="login" value="Se connecter" class="btn btn-block btn-primary">
              </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>