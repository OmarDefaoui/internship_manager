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

  // store chats and conversatons in arrays
  $requette = "SELECT * FROM conversation WHERE conversation_etudiant_id = $id_etudiant";
  $resultat = mysqli_query($link, $requette);
  $conversations = array();
  $chats = array();
  while ($data = mysqli_fetch_assoc($resultat)) {
    $conversations[] = $data;
    $conversation_id = $data['conversation_id'];

    // get chats for each conversation
    $requetteChat = "SELECT * FROM message WHERE message_conversation_id = $conversation_id";
    $resultatChat = mysqli_query($link, $requetteChat);
    $chat = array();
    while ($dataChat = mysqli_fetch_assoc($resultatChat)) {
      $chat[] = $dataChat;
    }
    $chats[] = $chat;
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

          <?php
          for ($i = 0; $i < count($conversations); $i++) {
            $conversation_message = $conversations[$i]['conversation_message'];
          ?>
            <div class="discussion<?php if ($i == 0) echo ' message-active' ?>">
              <div class="photo" style="background-image: url(http://e0.365dm.com/16/08/16-9/20/theirry-henry-sky-sports-pundit_3766131.jpg?20161212144602);">
              </div>
              <div class="desc-contact">
                <p class="name">Dave Corlew</p>
                <p class="message"><?php echo $conversation_message ?></p>
              </div>
              <div class="timer">3 min</div>
            </div>
          <?php
          }
          ?>
        </section>

        <section class="chat">
          <div class="header-chat">
            <img src="../../back_end/assets/images/5.png" alt="image">
            <p class="name">Megan Leib</p>
          </div>

          <div class="messages-chat">

            <?php
            $length = count($chats[0]);
            for ($i = 0; $i < $length; $i++) {
              $message_content = $chats[0][$i]['message_content'];
              $message_etudiant_id = $conversations[0]['conversation_etudiant_id'];
              $message_sender = $chats[0][$i]['message_sender'];

              $isWithImage = $i == 0 ? True : ($message_sender != $chats[0][$i - 1]['message_sender']);
              $isReponse = $message_sender == 1; // 0 for teacher, 1 for student
              $isLast = $i == $length - 1 ? True : ($message_sender != $chats[0][$i + 1]['message_sender']);
            ?>

              <div class="message<?php if (!$isWithImage) echo ' text-only' ?>">
                <?php if ($isWithImage && !$isReponse) { ?>
                  <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                    <div class="online"></div>
                  </div>
                <?php } ?>
                <div class="<?php if ($isReponse) echo 'response' ?>">
                  <p class="text"><?php echo $message_content ?></p>
                </div>
              </div>
              <?php if ($isLast) { ?>
                <p class="<?php if ($isReponse) echo 'response-time ' ?>time"> 14h58</p>
              <?php } ?>

            <?php } ?>
          </div>

          <div class="footer-chat">
            <form action="send_msg.php" method="post">
              <input type="hidden" name="conversation_id" value="<?php echo $conversations[0]['conversation_id'] ?>">
              <input type="text" name="message" id="write_message" placeholder="Type your message here" required="required">
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