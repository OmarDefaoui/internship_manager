<!-- creer un compte, et redirection a la page authentification.php -->

<?php
include('connexion.php');

if (isset($_POST['modifier'])) {
    $code = $_POST['code'];
    $email=$_POST['email'];

    // upload de la photo
    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0) {
        $dossier = 'photo/';
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
        $nom_photo = $email . "." . $extension_upload;
        if (!move_uploaded_file($temp_name, $dossier . $nom_photo)) {
            exit("Problem dans le telechargement de l'image, Ressayez");
        }
        $photo = $nom_photo;
    } else {
        $photo = 'inconnu.jpg';
    }
    

    $requette1="SELECT * FROM etudiant where email='$email'";
    $resultat1 = mysqli_query($link, $requette1);
    $etudiant=mysqli_fetch_assoc($resultat1);
    $requette2="SELECT * FROM enseignant where email='$email'";
    $resultat2 = mysqli_query($link, $requette2);
    $enseignant=mysqli_fetch_assoc($resultat2);


    // enregistrement des donnees dans la BD
    
    if ($etudiant!=false) {
        $requette9 = "UPDATE etudiant SET code='$code',photo='$photo'where email='$email' ";
        $resultat8 = mysqli_query($link, $requette9);
        header('location: ../front-end/index.php');
    }
    else if ($enseignant!=false) {
        $requette3 = "UPDATE enseignant SET code='$code',photo='$photo'where email='$email' ";
        $resultat3 = mysqli_query($link, $requette3);
        header('location: ../front-end/index.php');
    }
   
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>modifier profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row flex-lg-nowrap">
  <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
    <div class="card p-3">
      <div class="e-navlist e-navlist--active-bg">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link px-2 active" href="#"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>Home</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page" target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span>Settings</span></a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">benasser</h4>
                    <p class="mb-0">@hassan</p>
                    <div class="text-muted"><small>verifié</small></div>
                    <div class="mt-2">
                      <input type="file" name="fichier"/>
                    </div>
                    
                  </div>
                  
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form action="#" method="post" class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="name" placeholder="" value="">
                            </div>
                          </div>
                          <div class="col">
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="email">mail institutionel</label>
                              <input class="form-control" type="text" name="email" placeholder="user@example.com">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>About</label>
                              <textarea class="form-control" rows="5" placeholder="si vous avez une reclamation n'hesitez pas de la cité!!"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="code">New Password</label>
                              <input class="form-control" type="password" name="code" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="code">Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" name="code" placeholder="••••••"></div>
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
                        <button class="btn btn-primary" type="submit" name="modifier">modifier</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <button class="btn btn-block btn-secondary">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
              </button>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Remember</h6>
            <p class="card-text">Vous pouvez nous contactez si vous avez des problemes au cours de la modification.</p>
            <button type="button" class="btn btn-primary">Contact Us</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>

<style type="text/css">
body{
    margin-top:20px;
    background:#f8f8f8
}
</style>

<script type="text/javascript">

</script>
</body>
</html>