<?php
session_start();
  if(isset($_POST['msg'])) {
    if(!empty($_POST['msg'])) {
    $welcome =  "<span class='chatMsg'> <p class='pChatMsgNameWelcome'> Willkommen! </p> <p class='pChatMsgText'> Der Chat dient zu Demozwecken und ist nicht moderiert. </br> Er wird in regelmässigen Abständen gelöscht! </br> Registrierung nicht möglich! </br> Chat kommt ohne Websockets aus und ist daher etwas träge.. </p> </span>";
    $chat =  "<span class='chatMsg'> <p class='pChatMsgName'>" . $_SESSION['guestName'] . "</p> <p class='pChatMsgText'>" . htmlspecialchars($_POST['msg']) . "</p> </span>";
    if(!file_exists("../chat.txt")) {
      $file = fopen("../chat.txt", "a");
      echo fwrite($file,$welcome);
      echo fwrite($file,$chat);
      fclose($file);
    } else {
      $file = fopen("../chat.txt", "a");
      echo fwrite($file,$chat);
      fclose($file);
    }
  }
  }
  header('Location: ../chat.php');
 ?>
