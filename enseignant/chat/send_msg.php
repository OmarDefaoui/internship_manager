<?php
if (isset($_POST['send_message'])) {
    $message = $_POST['message'];
    $date = date('Y-m-d h:m:sa');
    $sender = 0; // 0 for techer; 1 for student
    $conversation_id = $_POST['conversation_id'];
    $convIndex = $_POST['conv_index'];

    $requetteMessage = "INSERT INTO message (message_content,message_date,message_sender,
            message_conversation_id) VALUES ('$message','$date','$sender','$conversation_id')";
    $resultatMessage = mysqli_query($link, $requetteMessage);
} else
    $convIndex = getActiveConvIndex();
?>