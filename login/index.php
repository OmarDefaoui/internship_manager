<?php
session_start();
include('connexion.php');

if (isset($_POST['login'])) {
  $email=$_POST['username'];
  $pass=$_POST['passe'];
 
    $requette1="SELECT * FROM etudiant where email='$email' and code='$pass'";
    $resultat1 = mysqli_query($link, $requette1);
    $etudiant=mysqli_fetch_assoc($resultat1);
    $requette2="SELECT * FROM enseignant where email='$email' and code='$pass'";
    $resultat2 = mysqli_query($link, $requette2);
    $enseignant=mysqli_fetch_assoc($resultat2);
    $requette3="SELECT * FROM administrateur where email='$email' and code='$pass'";
    $resultat3 = mysqli_query($link, $requette3);
    $admin=mysqli_fetch_assoc($resultat3);
    
    
    
    if ($etudiant!=false) {
      
      $_SESSION['id'] = $etudiant['id_etudiant'];
      $_SESSION['nom'] = $etudiant['nom'];
      $_SESSION['prenom'] = $etudiant['prenom'];
      $_SESSION['photo'] = $etudiant['photo'];
      $_SESSION['email'] = $etudiant['email'];
      if($pass=='azerty'){header("location:edit_profile.php");}
      else{header("location:../student/student/student.php");}
      
        
    }
    else if ($enseignant!=false) {
      
      $_SESSION['id'] = $enseignant['id_enseignant'];
      $_SESSION['nom'] = $enseignant['nom_enseignant'];
      $_SESSION['prenom'] = $enseignant['prenom_enseignant'];
      $_SESSION['photo'] = $enseignant['photo'];
      $_SESSION['email'] = $enseignant['email'];
      if($pass=='azerty'){header("location:edit_profile.php");}
      else{header("location:../enseignant/accueil_enseignant.php");}
    }
    elseif ($admin!=false) {
      $_SESSION['id'] = $admin['id_administrateur'];
      $_SESSION['nom'] = $admin['nom'];
      $_SESSION['prenom'] = $admin['prenom'];
      $_SESSION['photo'] = $admin['photo'];
      $_SESSION['email'] = $admin['email'];
      if($pass=='azerty'){header("location:edit_profile.php"); }
      else{header("location:../admin/accueil_admin.php");}
    }

  
}

mysqli_close($link);
?>

<!doctype html>
<html lang="en">
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
    <link rel="stylesheet" href="monstyle.css">

    <title>gestion pfe</title>
    
  </head>
  <body>
    <div class="main">
      <div class="navbar">
          <div class="menu">
              <ul>
                  <li><a href="home.php">HOME</a></li>
                  <li><a href="#">ABOUT</a></li>
                  <li><a href="#">SERVICE</a></li>
                  <li id="aa"><a href="#">CONTACT</a></li>
                  <li><a href="#">USE?</a></li>
              </ul>
          </div>
      </div>
     
  </div>
  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In</h3>
              <p class="mb-4">veuillez se connecter avec votre mail institutionnelle pour y-acceder.</p>
            </div>
           
            <form id="form" action="#" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" name="passe" class="form-control" id="password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                <div> <?php 
                

                ?></div>
              </div>

              <input id="log" type="submit" name="login" value="Log In" class="btn btn-block btn-primary">
              
              <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
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