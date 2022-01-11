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

  if (isset($_GET['id_stage'])) {
    $isNew = False;
    $id_stage = $_GET['id_stage'];

    // trouver les information sur le stage voulu
    $requetteStage = "SELECT * FROM stage WHERE id_stage = $id_stage";
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
    $fiche_evalution = $dataStage['fiche_evalution'];
    $nom_encadrant = $dataStage['nom_encadrant'];
    $prenom_encardrant = $dataStage['prenom_encardrant'];
    $note = $dataStage['note'];
    $est_validé = $dataStage['est_valide'];
    $type = $dataStage['type'];
    $id_enseignant = $dataStage['id_enseignant'];
    $id_entreprise = $dataStage['id_entreprise'];
    $id_etudiant = $dataStage['id_etudiant'];
    $prenom_binome = $dataStage['prenom_binome'];
    $nom_binome = $dataStage['nom_binome'];
    $photo_binome = $dataStage['photo_binome'];

    if (isset($id_entreprise)) {
      $requetteEntreprise = "SELECT * FROM entreprise WHERE id_entreprise = $id_entreprise";
      $resultatEntreprise = mysqli_query($link, $requetteEntreprise);
      $dataEntreprise = mysqli_fetch_assoc($resultatEntreprise);
      if ($dataEntreprise != False) {
        $nom_entreprise = $dataEntreprise['nom'];
        $adresse_entreprise = $dataEntreprise['adresse'];
        $ville_entreprise = $dataEntreprise['ville'];
        $tel_entreprise = $dataEntreprise['tel'];
      }
    } else {
      $nom_entreprise = NULL;
      $adresse_entreprise = NULL;
      $ville_entreprise = NULL;
      $tel_entreprise = NULL;
    }
  } else {
    $isNew = True;

    $id_stage = NULL;
    $intitule_sujet = NULL;
    $description_sujet = NULL;
    $duree = NULL;
    $technologies = NULL;
    $premiere_version = NULL;
    $version_corrige = NULL;
    $presentation = NULL;
    $attestation_stage = NULL;
    $fiche_evalution = NULL;
    $nom_encadrant = NULL;
    $prenom_encardrant = NULL;
    $note = NULL;
    $est_validé = NULL;
    $type = NULL;
    $id_enseignant = NULL;
    $id_entreprise = NULL;
    $prenom_binome = NULL;
    $nom_binome = NULL;
    $photo_binome = NULL;

    $nom_entreprise = NULL;
    $adresse_entreprise = NULL;
    $ville_entreprise = NULL;
    $tel_entreprise = NULL;
  }
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
  <title>Internship Manager</title>

  <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
  <script src="../student_home/student_home.js"></script>

  <link rel="stylesheet" href="../main_style.css">
  <link rel="stylesheet" href="css/chat.css">
  <link rel="stylesheet" href="../student_home/css/nav_bar_style.css">
  <link rel="stylesheet" href="../student_home/css/right_section_style.css">
</head>

<body>
  <!-- top nav bar -->
  <nav>
    <div id="logo_container">
      <img src="../assets/images/logo.png" alt="Logo" id="logo">
    </div>

    <div id="nav_center">
      <h2>Stages</h2>
      <div id="search_bar">
        <input type="text" name="search" placeholder="Rechercher">
        <img src="../assets/images/search.png" alt="search" class="rounded_icon_light">
      </div>
      <div id="add_button">
        <img src="../assets/images/add.png" alt="add" class="rounded_icon_dark">
        <p>Ajouter un stage</p>
      </div>
    </div>

    <div id="nav_right">
      <img src="../assets/images/chat.png" alt="chat" class="rounded_icon_dark">
      <img src="../assets/images/notification.png" alt="notifications" class="rounded_icon_dark">
    </div>
  </nav>

  <div id="content">
    <!-- left nav bar -->
    <aside id="left_side">
      <div id="left_navition">
        <li><a href="#" class="nav_active">
            <div></div><img src="../assets/svg/home.svg" alt="">
          </a></li>
        <li><a href="#">
            <div></div><img src="../assets/svg/more.svg" alt="">
          </a></li>
        <li><a href="#">
            <div></div><img src="../assets/svg/share.svg" alt="">
          </a></li>
        <li><a href="#">
            <div></div><img src="../assets/svg/about.svg" alt="">
          </a></li>
        <li><a href="#">
            <div></div><img src="../assets/svg/settings.svg" alt="">
          </a></li>
      </div>
      <div id="modes">
        <p>Modes</p>
        <div id="mode_toggle">
          <label>
            <input class='toggle-checkbox' type='checkbox'></input>
            <div class='toggle-slot'>
              <div class='sun-icon-wrapper'>
                <div class="iconify sun-icon" data-icon="feather-sun" data-inline="false"></div>
              </div>
              <div class='toggle-button'></div>
              <div class='moon-icon-wrapper'>
                <div class="iconify moon-icon" data-icon="feather-moon" data-inline="false"></div>
              </div>
            </div>
          </label>
        </div>


      </div>
    </aside>

    <!-- main content -->
    <main>
      <div class="chat_container">
        <section class="discussions">
          <div class="discussion search">
            <div class="searchbar">
              <i class="fa fa-search" aria-hidden="true"></i>
              <input type="text" placeholder="Search..."></input>
            </div>
          </div>

          <div class="discussion message-active">
            <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
            </div>
            <div class="desc-contact">
              <p class="name">Megan Leib</p>
              <p class="message">9 pm at the bar if possible 😳</p>
            </div>
            <div class="timer">12 sec</div>
          </div>

          <div class="discussion">
            <div class="photo" style="background-image: url(http://e0.365dm.com/16/08/16-9/20/theirry-henry-sky-sports-pundit_3766131.jpg?20161212144602);">
            </div>
            <div class="desc-contact">
              <p class="name">Dave Corlew</p>
              <p class="message">Let's meet for a coffee or something today ?</p>
            </div>
            <div class="timer">3 min</div>
          </div>

          <div class="discussion">
            <div class="photo" style="background-image: url(http://e0.365dm.com/16/08/16-9/20/theirry-henry-sky-sports-pundit_3766131.jpg?20161212144602);">
            </div>
            <div class="desc-contact">
              <p class="name">Dave Corlew</p>
              <p class="message">Let's meet for a coffee or something today ?</p>
            </div>
            <div class="timer">3 min</div>
          </div>

          <div class="discussion">
            <div class="photo" style="background-image: url(http://e0.365dm.com/16/08/16-9/20/theirry-henry-sky-sports-pundit_3766131.jpg?20161212144602);">
            </div>
            <div class="desc-contact">
              <p class="name">Dave Corlew</p>
              <p class="message">Let's meet for a coffee or something today ?</p>
            </div>
            <div class="timer">3 min</div>
          </div>
        </section>

        <section class="chat">
          <div class="header-chat">
            <img src="../../back_end/assets/images/5.png" alt="image">
            <p class="name">Megan Leib</p>
          </div>

          <div class="messages-chat">
            <div class="message">
              <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                <div class="online"></div>
              </div>
              <p class="text"> Hi, how are you ? </p>
            </div>

            <div class="message text-only">
              <p class="text"> What are you doing tonight ? Want to go take a drink ?</p>
            </div>

            <p class="time"> 14h58</p>

            <div class="message text-only">
              <div class="response">
                <p class="text"> Hey Megan ! It's been a while 😃</p>
              </div>
            </div>

            <div class="message text-only">
              <div class="response">
                <p class="text"> When can we meet ?</p>
              </div>
            </div>

            <p class="response-time time"> 15h04</p>

            <div class="message">
              <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                <div class="online"></div>
              </div>
              <p class="text"> 9 pm at the bar if possible 😳</p>
            </div>

            <p class="time"> 15h09</p>

            <div class="message">
              <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                <div class="online"></div>
              </div>
              <p class="text"> Hi, how are you ? </p>
            </div>

            <div class="message text-only">
              <p class="text"> What are you doing tonight ? Want to go take a drink ?</p>
            </div>

            <p class="time"> 14h58</p>

            <div class="message text-only">
              <div class="response">
                <p class="text"> Hey Megan ! It's been a while 😃</p>
              </div>
            </div>

            <div class="message text-only">
              <div class="response">
                <p class="text"> When can we meet ?</p>
              </div>
            </div>

            <p class="response-time time"> 15h04</p>

            <div class="message">
              <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                <div class="online"></div>
              </div>
              <p class="text"> 9 pm at the bar if possible 😳</p>
            </div>

            <p class="time"> 15h09</p>
          </div>

          <div class="footer-chat">
            <form action="#" method="post">
              <input type="text" id="write_message" placeholder="Type your message here" required="required">
              <input type="submit" name="send_message" id="send_message" value="Send">
            </form>
          </div>
        </section>
      </div>
    </main>

    <!-- right side -->
    <aside id="right_side">
      <div id="hello_container">
        <p>Bienvenue,<br><b><?php echo $prenom . ' ' . $nom ?></b></p>
        <img src="../../back_end/assets/images/<?php echo $photo ?>" alt="user_icon">
      </div>

      <?php
      $stagesCount = $_SESSION['stagesCount'];
      $stagesValideCount = $_SESSION['stagesValideCount'];
      $stagesNotesCount = $_SESSION['stagesNotesCount'];
      ?>
      <div id="overview_container">
        <div class="overview">
          <p class="overview_name">Stages :</p>
          <b class="overview_data"><?php echo $stagesCount ?></b>
        </div>

        <div class="overview">
          <p class="overview_name">En cours :</p>
          <b class="overview_data"><?php echo $stagesCount - $stagesNotesCount ?></b>
        </div>

        <div class="overview">
          <p class="overview_name">Validés :</p>
          <b class="overview_data"><?php echo $stagesValideCount ?></b>
        </div>

        <div class="overview">
          <p class="overview_name">Notés :</p>
          <b class="overview_data"><?php echo $stagesNotesCount ?></b>
        </div>
      </div>

      <div id="activity_container">
        <p id="activity_title">Flux <b>d'activité</b></p>
        <div id="feeds_container">
          <?php
          $requetteNotif = "SELECT * FROM notification WHERE id_target='$id_etudiant' LIMIT 2";
          $resultatNotif = mysqli_query($link, $requetteNotif);
          while ($dataNotif = mysqli_fetch_assoc($resultatNotif)) {
            $contentNotif = $dataNotif['content'];
            $iconNotif = $dataNotif['icon'];

            // calculate difference between 2 dates
            $diff = abs(strtotime(date("Y-m-d")) - strtotime($dataNotif['date']));
            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            $dateNotif = $years != 0 ? ($years . ' années') : ($months != 0 ? ($months . ' mois') : ($days . ' jours'));
          ?>

            <div class="feed">
              <img src="../../back_end/assets/images/<?php echo $iconNotif ?>" alt="user_icon">
              <div class="text_container">
                <p class="content"><?php echo $contentNotif ?></p>
                <p class="time"><?php echo $dateNotif ?></p>
              </div>
            </div>

          <?php }
          ?>
        </div>
        <a href="#" id="see_more">See more</a>
      </div>
    </aside>
  </div>

  <!-- For Entreprise nom auto complete -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
  <script src="add_edit_internship.js"></script>

</body>

</html>