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

    if (isset($_POST['send_message'])) {
        $message = $_POST['message'];
        $date = date('Y-m-d h:m:sa');
        $sender = 1;
        $conversation_id = $_POST['conversation_id'];

        $requetteMessage = "INSERT INTO message (message_content,message_date,message_sender,
            message_conversation_id) VALUES ('$message','$date','$sender','$conversation_id')";
        $resultatMessage = mysqli_query($link, $requetteMessage);

        header('location:chat.php');
    } else {
        header("location:login.php");
    }
} else {
    header("location:login.php");
}
