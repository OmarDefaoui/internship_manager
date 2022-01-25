<!-- creer un compte, et redirection a la page authentification.php -->

<?php
session_start();
include("../connexion.php");

$id = $_SESSION['id'];
$name = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$photo = $_SESSION['photo'];
$email = $_SESSION['email'];
$code = $_SESSION['code'];


if ($photo == NULL)
  $photo = 'inconnu.jpg';

$isNotMatchPass = false;

if (isset($_POST['modifier'])) {
  if (isset($_POST['confirmer_code']) && isset($_POST['confirmer_code'])) {
    if($_POST['code']!=null){
    $code = $_POST['code'];}
    $confirmer_code = $_POST['confirmer_code'];
    if (strcmp($code, $confirmer_code) == 0) {

      $isNotMatchPass = false;

      // upload de la photo
      if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0) {
        $dossier = '../assets/assets/images/';
        $temp_name = $_FILES['fichier']['tmp_name'];
        if (!is_uploaded_file($temp_name)) {
          exit("le fichier est introuvable");
        }
        if ($_FILES['fichier']['size'] >= 1000000) {
          exit("Erreur, le fichier est volumineux");
        }
        $infosfichier = pathinfo($_FILES['fichier']['name']);
        $extension_upload = $infosfichier['extension'];

        $extension_upload = strtolower($extension_upload);
        $extensions_autorisees = array('png', 'jpeg', 'jpg');
        if (!in_array($extension_upload, $extensions_autorisees)) {
          exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png)");
        }
        $nom_photo = $id . $name . $prenom . "." . $extension_upload;
        if (!move_uploaded_file($temp_name, $dossier . $nom_photo)) {
          exit("Problem dans le telechargement de l'image, Ressayez");
        }
        $photo1 = $nom_photo;

        // update session with the new image
        $_SESSION['photo'] = $photo1;
      } else {
        $photo1 = $photo;
      }

      $requette1 = "SELECT * FROM etudiant where email='$email'";
      $resultat1 = mysqli_query($link, $requette1);
      $etudiant = mysqli_fetch_assoc($resultat1);

      $requette2 = "SELECT * FROM enseignant where email='$email'";
      $resultat2 = mysqli_query($link, $requette2);
      $enseignant = mysqli_fetch_assoc($resultat2);

      $requette3 = "SELECT * FROM administrateur where email='$email'";
      $resultat3 = mysqli_query($link, $requette3);
      $admin = mysqli_fetch_assoc($resultat3);

      // enregistrement des donnees dans la BD

      if ($etudiant != false) {
        $requette9 = "UPDATE etudiant SET code='$code',photo='$photo1'where email='$email' ";
        $resultat8 = mysqli_query($link, $requette9);
        echo "<script type='text/javascript'>
  window.top.location = '../student/student/student.php';
</script>";
      } else if ($enseignant != false) {
        $requette10 = "UPDATE enseignant SET code='$code',photo='$photo1'where email='$email' ";
        $resultat10 = mysqli_query($link, $requette10);
        echo "<script type='text/javascript'>
    window.top.location = '../enseignant/accueil_enseignant.php';
  </script>";
      } else if ($admin != false) {
        $requette11 = "UPDATE administrateur SET code='$code',photo='$photo1'where email='$email' ";
        $resultat11 = mysqli_query($link, $requette11);
        echo "<script type='text/javascript'>
    window.top.location = '../admin/accueil_admin.php/student.php';
  </script>";
      }
    } else {
      // code et sa confirmation sont differents
      $isNotMatchPass = true;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">

  <title>odifier profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="../main_style.css">
  <link rel="stylesheet" href="css/profile.css">

</head>

<body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
    <form action="#" method="post" class="form" novalidate="" enctype="multipart/form-data">
      <div class="card-body">
        <div class="e-profile">
          <div class="row">
            <div class="col-12 col-sm-auto mb-3">
              <div class="mx-auto" style="width: 140px;">
                <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                  <img src="../assets/assets/images/<?php echo $photo ?>" alt="" height="140px" width="140px" style="border-radius: 50%;">
                </div>
              </div>
            </div>
            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
              <div class="text-center text-sm-left mb-2 mb-sm-0">
                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"></h4>
                <p class="mb-0"></p>
                <div class="text-muted"><strong><?php echo $name . ' ' . $prenom ?></strong></div>
                <div class="mt-2">
                  <div class="input_upload_container" data-text="Choisissez une photo">
                    <input name="fichier" type="file" class="input_upload">
                  </div>
                </div>

              </div>

            </div>
          </div>
          <ul class="nav nav-tabs">

          </ul>
          <div class="tab-content pt-3">
            <div class="tab-pane active">
              <div class="row">
                <div class="col">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">

                        <label>Nom complet</label>
                        <input class="form-control" type="text" name="name" disabledplaceholder="" disabled value="<?php echo $name . ' ' . $prenom ?>">
                      </div>
                    </div>
                    <div class="col">

                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="email">Email institutionnelle</label>
                        <input class="form-control" disabled type="text" name="email" value="<?php echo $email ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <div class="form-group">
                        <label>Réclamation</label>
                        <textarea name="reclamation" class="form-control" rows="5" placeholder="Si vous avez une réclamation n'hésitez pas à la citer"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-sm-6 mb-3">
                  <div class="mb-2"><b>Changer mot de passe</b></div>
                  <div class="row">
                    <div class="col">

                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="code">Nouveau mot de passe</label>
                        <input class="form-control" type="password" name="code" placeholder="••••••">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="code">Confirmer le nouveau mot de passe <span class="d-none d-xl-inline">Mot de passe</span></label>
                        <input class="form-control" type="password" name="confirmer_code" placeholder="••••••">
                        <p style="color: red; margin-top: 6px;"><?php if ($isNotMatchPass) echo '* Le nouveau code et sa confirmation sont différants.' ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-5 offset-sm-1 mb-3">

                  <div class="row">
                    <div class="col">

                      <div class="custom-controls-stacked px-2">
                        <div class="custom-control custom-checkbox">

                        </div>
                        <div class="custom-control custom-checkbox">

                        </div>
                        <div class="custom-control custom-checkbox">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col d-flex justify-content-end">
                  <button class="btn btn-primary" type="submit" name="modifier" style="border-radius: 25px; padding: 8px 18px;">Modifier</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <style type="text/css">
    body {
      margin-top: 20px;
      background: transparent;
      overflow-y: scroll;
    }
  </style>

  <script type="text/javascript">

  </script>
</body>

</html>