<?php
session_start();

if (isset($_SESSION['id'])) {
  include('../../connexion.php');

  $id_enseignant = $_SESSION['id'];
  $prenom = $_SESSION['prenom'];
  $nom = $_SESSION['nom'];
  $photo = $_SESSION['photo'];


  $requette1="SELECT *from enseignant where id_enseignant='$id_enseignant'";
  $requette2 = mysqli_query($link,$requette1);
  $requette3 = mysqli_fetch_assoc($requette2);
  $prenom = $requette3['prenom_enseignant'];
  $nom=$requette3['nom_enseignant'];
  $email =$requette3['email'];
  $code = $requette3['code'];
  $photo1=$requette3['photo'];

  // save chat message in db if is message sended
  // and get active conversation index
  include('send_msg.php');


  // store chats and conversatons in arrays
  $requette = "SELECT * FROM conversation c,etudiant e WHERE 
    c.conversation_enseignant_id=$id_enseignant AND c.conversation_etudiant_id=e.id_etudiant";
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
  //compteur
  $compteur = "select * from stage";
  $compt1 = mysqli_query($link, $compteur);
  $n1 = mysqli_num_rows($compt1);
  //
  $compteur2 = "select * from stage where id_enseignant is null";
  $compt2 = mysqli_query($link, $compteur2);
  $n2 = mysqli_num_rows($compt2);
  //
  $compteur3 = "select * from stage where id_enseignant =$id_enseignant";
  $compt3 = mysqli_query($link, $compteur3);
  $n3 = mysqli_num_rows($compt3);
} else {
  header("location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../assets/local_assets/images/logo.png" type="image/png">
  <title>Gestion Stages</title>

  <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
  <script src="../../student/student/student.js"></script>

  <link rel="stylesheet" href="../../main_style.css">
  <link rel="stylesheet" href="../../student/conv/css/conv.css">
  <link rel="stylesheet" href="../style_accueil_nav.css ">
  <link rel="stylesheet" href="../right_section_style.css">
</head>

<body>
  <!-- top nav bar -->
  <nav>
    <div id="logo_container">
      <img src="../../assets/local_assets/images/logo.png" alt="Logo" id="logo" onClick="window.open('../accueil_enseignant.php', '_self')">
    </div>

    <div id="nav_center">
      <h2>Stages</h2>
      <div id="search_bar">
        <input type="text" name="search1" placeholder="Rechercher" id="inputes">
        <button type="submit" name="sent" id="test1"><img src="../../assets/local_assets/images/search.png" alt="search" class="rounded_icon_light"></button>
      </div>
    </div>

    <div id="nav_right">
      <img src="../../assets/local_assets/images/conv.png" alt="chat" class="rounded_icon_dark" onClick="window.open('conv.php', '_self')">
      <img src="../../assets/local_assets/images/notification.png" alt="notifications" class="rounded_icon_dark">
    </div>
  </nav>

  <div id="content">
    <!-- left nav bar -->
    <aside id="left_side">
      <div id="left_navition">
        <li><a href="#" class="nav_active">
            <div></div><img src="../../assets/local_assets/svg/home.svg" alt="" onClick="window.open('../accueil_enseignant.php', '_self')">
          </a></li>
        <li><a href="#">
            <div></div><img src="../../assets/local_assets/svg/more.svg" alt="">
          </a></li>
        <li><a href="#">
            <div></div><img src="../../assets/local_assets/svg/share.svg" alt="">
          </a></li>
        <li><a href="../../index.php">
            <div></div><img src="../../assets/local_assets/svg/about.svg" alt="">
          </a></li>
        <li><a href="../../profile/profile.php">
            <div></div><img src="../../assets/local_assets/svg/settings.svg" alt="" onClick="window.open('../../profile/profile.php', '_self')">
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
      <?php
      if (count($conversations) == 0) {
        // no conversations, so show empty icon
      ?>
        <div class="empty_container">
          <img src="../../assets/local_assets/svg/no_conv.svg" alt="empty" height="70%">
        </div>
      <?php
      } else {
      ?>
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
              // no messages in the conversation
              if (count($chats[$i]) == 0) {
                $lastMessage = array('message_date' => date("Y-m-d h:m:s"));
                $convLastMessage = '';
              } else {
                $lastMessage = $chats[$i][count($chats[$i]) - 1];
                $convLastMessage = $lastMessage['message_content'];
              }

              $convSenderId = $conversations[$i]['conversation_etudiant_id'];

              // get sender icon and photo

              // get sender icon and photo
              $senderName = $conversations[$i]['nom'] . ' ' . $conversations[$i]['prenom'];
              $senderIcon = $conversations[$i]['photo'];

              // calculate difference between 2 dates
              $convDate = getDiffDate($lastMessage['message_date']);
            ?>
              <form action="#" method="post">
                <div type="submit" class="discussion<?php if ($i == $convIndex) echo ' message-active' ?>" onClick="document.forms[<?php echo $i ?>].submit();">
                  <div class="photo" style="background-image: url('../../assets/assets/images/<?php echo $senderIcon ?>');">
                  </div>
                  <div class="desc-contact">
                    <p class="name"><?php echo $senderName ?></p>
                    <p class="message"><?php echo $convLastMessage ?></p>
                  </div>
                  <div class="timer"><?php echo $convDate ?></div>
                  <input type="hidden" name="conv_index" value="<?php echo $i ?>">
                </div>
              </form>
            <?php
            }
            ?>
          </section>

          <section class="chat">
            <div class="header-chat">
              <div class="photo" style="background-image: url('../../assets/assets/images/<?php echo $conversations[$convIndex]['photo'] ?>');"></div>
              <p class="name"><?php echo $conversations[$convIndex]['nom'] . ' ' . $conversations[$convIndex]['prenom'] ?></p>
            </div>

            <div class="messages-chat">

              <?php
              $length = count($chats[$convIndex]);
              for ($i = 0; $i < $length; $i++) {
                $message_content = $chats[$convIndex][$i]['message_content'];
                $message_sender = $chats[$convIndex][$i]['message_sender'];
                $message_date = $chats[$convIndex][$i]['message_date'];

                $isWithImage = $i == 0 ? True : ($message_sender != $chats[$convIndex][$i - 1]['message_sender']);
                $isReponse = $message_sender == 0; // 0 for teacher, 1 for student
                $isLast = $i == $length - 1 ? True : ($message_sender != $chats[$convIndex][$i + 1]['message_sender']);
              ?>

                <div class="message<?php if (!$isWithImage) echo ' text-only' ?>">
                  <?php if ($isWithImage && !$isReponse) { ?>
                    <div class="photo" style="background-image: url('../../assets/assets/images/<?php echo $conversations[$convIndex]['photo'] ?>');">
                      <div class="online"></div>
                    </div>
                  <?php } ?>
                  <div class="<?php if ($isReponse) echo 'response' ?>">
                    <p class="text"><?php echo $message_content ?></p>
                  </div>
                </div>
                <?php if ($isLast) { ?>
                  <p class="<?php if ($isReponse) echo 'response-time ' ?>time"><?php echo getDiffDate($message_date) ?></p>
                <?php } ?>

              <?php } ?>
            </div>

            <div class="footer-chat">
              <form action="#" method="post">
                <input type="hidden" name="conversation_id" value="<?php echo $conversations[$convIndex]['conversation_id'] ?>">
                <input type="text" name="message" id="write_message" placeholder="Type your message here" required="required" autofocus>
                <input type="hidden" name="conv_index" value="<?php echo $convIndex ?>">
                <input type="submit" name="send_message" id="send_message" value="Send">
              </form>
            </div>
          </section>
        </div>
      <?php } ?>
    </main>

    <!-- right side -->
    <aside id="right_side">
      <div id="hello_container" onClick="window.open('../../profile/profile.php', '_self')">
        <p>Bienvenue,Pr <br><b><?php echo $nom ?> </b></p>
        <img src="../../assets/assets/images/<?php echo $photo1 ?>" alt="user_icon">
      </div>

      <div id="overview_container">
        <div class="overview">
          <p class="overview_name">Nombre des stages :</p>
          <b class="overview_data"><?php echo $n1 ?></b>
        </div>

        <div class="overview">
          <p class="overview_name">Total des encadr??s :</p>
          <b class="overview_data"><?php echo ($n1 - $n2) ?></b>
        </div>

        <div class="overview">
          <p class="overview_name">Total des non encadr??s :</p>
          <b class="overview_data"><?php echo $n2 ?></b>
        </div>

        <div class="overview">
          <p class="overview_name">Que vous encadr??s</p>
          <b class="overview_data"><?php echo $n3 ?></b>
        </div>
      </div>

      <div id="activity_container">
        <p id="activity_title">Flux <b>d'activit??</b></p>
        <div id="feeds_container">
          <div class="feed">
            <img src="../../assets/local_assets/images/face1.png" alt="user_icon">
            <div class="text_container">
              <p class="content"><b>Omar defaoui</b> a deposer la version corrig?? du rapport</p>
              <p class="time"> 4 jours </p>
            </div>
          </div>
          <div class="feed">
            <img src="../../assets/local_assets/images/face2.png" alt="user_icon">
            <div class="text_container">
              <p class="content"><b>Hassan ayoub benasser </b> a D??poser la pr??sentation</p>
              <p class="time">16 jours</p>
            </div>

          </div>
          <a href="#" id="see_more">Voir plus</a>
        </div>
    </aside>
  </div>

  <!-- For Entreprise nom auto complete -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
  <script src="internship.js"></script>

  <!-- to scroll to bottom when open page to see the last message -->
  <script>
    var scroll = $('.messages-chat');
    scroll.animate({
      scrollTop: scroll.prop("scrollHeight")
    }, 0);
  </script>

</body>

</html>

<?php
function getActiveConvIndex()
{
  if (isset($_POST['conv_index'])) {
    return $_POST['conv_index'];
  } else
    return 0;
}

function getDiffDate($lastDate)
{
  // calculate difference between 2 dates
  $diff = abs(strtotime(date("Y-m-d h:m:s")) - strtotime($lastDate));
  $years = floor($diff / (365 * 60 * 60 * 24));
  $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
  $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
  $hours   = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
  $minuts  = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
  $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minuts * 60));
  if ($years != 0)
    $result = $years . ' ann??es';
  elseif ($months != 0)
    $result = $months . ' mois';
  elseif ($days != 0)
    $result = $days . ' jours';
  elseif ($hours != 0)
    $result = $hours . ' heures';
  elseif ($minuts != 0)
    $result = $minuts . ' minutes';
  elseif ($seconds != 0)
    $result = $seconds . ' secondes';
  else
    $result = 'A l\'instant';
  return $result;
}
?>