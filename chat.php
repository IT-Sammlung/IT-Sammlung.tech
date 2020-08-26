<!-- HEAD -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="assets/css/normalize.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <style>

/* CSS */

  html {
      box-sizing: border-box;
      font-size: 16px;
  }

  *,*:before,*:after {
      box-sizing: inherit;
  }

  .headerBackground {
    width: 100%;
    height: 20vh;
    min-height: 100px;
    background-image: url("assets/img/header.jpg");
    background-repeat: no-repeat;
    background-size: cover;
  }

  .header {
    width: 100%;
    height: 100%;
  }

  .headerLogo {
    width: 100%;
    height: 70%;
    padding-left: 1%;
  }

  .headerLogo img {
    height: 100%;
  }

  .headerMenu {
    width: 100%;
    height: 30%;
    background-color: rgba(0,0,0,0.1);
  }

  .headerMenuLeft {
    height: 100%;
    width: 50%;
    float: left;
  }

  .headerMenuLeft button {
    height: 60%;
    top: 20%;
    position: relative;
    margin-left: 15px;
    padding-left: 18px;
    padding-right: 18px;
    background-color: white;
    border: 0px solid gray;
    color: gray;
    box-shadow: 0 0 6px pink, 0 0 10px pink;
  }

  .headerMenuLeft button:hover {
    color: black;
    box-shadow: 0 0 12px pink, 0 0 20px pink;

  }

  .headerMenuRight {
    height: 100%;
    width: 50%;
    float: left;
    text-align: right;
  }

  #chatOut {
    height: 60vh;
    margin-top: 1vh;
    margin-left: 12px;
    font-size: 1.1em;
    display: flex;
    overflow-y: hidden;

  }

  #output {
    width: 100%;
    align-self: flex-end;
    margin-top: auto;
  }

  .pChatMsgName {
    margin: 0;
    font-weight: bold;
    color: Darkviolet;

  }

  .pChatMsgNameWelcome {
    margin: 0;
    font-weight: bold;
    color: blue;
  }

  .pChatMsgText {
    margin: 0;
  }

  .chatMsg {
    display: block;
  }

  .chatIn {
    height: 6vh;
    position: relative;
  }

  .inputText {
    width: 70%;
    position: absolute;
    bottom: 0;
    left: 0;
    font-size: 1.1em;
    margin-left: 5px;
    box-shadow: 0 0 6px pink, 0 0 10px pink;
    border: 1px solid darkgray;
  }

  .inputText:focus {
    box-shadow: 0 0 12px pink, 0 0 20px pink;
  }

  .inputButton {
    width: 23%;
    position: absolute;
    bottom: 0;
    right: 0;
    font-size: 1.1em;
    margin-right: 5px;
    background-color: white;
    border: 1px solid gray;
    color: gray;
    box-shadow: 0 0 6px pink, 0 0 10px pink;
  }

  .inputButton:hover {
    box-shadow: 0 0 12px pink, 0 0 20px pink;
  }

  .inputButton:active {
    box-shadow: 0 0 20px pink, 0 0 40px pink;
    color: pink;
  }

  .wrapperLogin {
    background-image: url("assets/img/loginBack.jpg");
    height: 100vh;
    width: 100%;
    display: flex;
  }

  .center {
    margin: auto;
    text-align: center;
  }

  .loginButtons {
    background-color: white;
    border: 0px solid gray;
    color: gray;
    box-shadow: 0 0 6px pink, 0 0 10px pink;
    margin-top: 10px;
    margin-bottom: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;
  }

  .loginButtons:hover {
    box-shadow: 0 0 12px pink, 0 0 20px pink;
  }

  .loginButtons:active {
    box-shadow: 0 0 20px pink, 0 0 40px pink;
  }

  .loginInput {
    box-shadow: 0 0 6px pink, 0 0 10px pink;
    border: 1px solid darkgray;
    margin-bottom: 5px;
    font-size: 1.1em;
  }

  .loginInput:hover {
    box-shadow: 0 0 12px pink, 0 0 20px pink;
  }

  .loginInput:focus {
    box-shadow: 0 0 12px pink, 0 0 20px pink;
  }

  .loginLegend {
    text-align: left;
    margin-left: 2px;
    margin-top: 10px;
    margin-right: 0;
    margin-bottom: 5px;
    font-family: "verdana";
    color: rgba(107, 0, 64, 0.68);
    text-shadow: -1px 0px 8px rgba(241, 140, 191, 1);
  }

  .loginLink {
    color: rgba(107, 0, 64, 0.68);
    text-decoration: none;
    font-family: "verdana";
    display: block;
    margin-top: 5px;
    margin-bottom: 5px;
  }

  .loginLink:hover {
    font-weight: bold;
  }

  /* Desktop View */
  @media only screen and (min-width: 900px) {

    .headerMenuLeft button {
      font-size: 1em;
      margin-left: 30px;
    }

    #chatOut {
      height: 70vh;
      font-size: 1.3em;
    }

    .inputText {
      width: 85%;
      position: absolute;
      bottom: 0;
      left: 0;
      margin-left: 10px;
      font-size: 1.5em;
      padding-left: 5px;
    }

    .inputButton {
      width: 10%;
      position: absolute;
      bottom: 0;
      right: 0;
      font-size: 1.5em;
      margin-right: 40px;
    }

    .chatIn {
      height: 5vh;
    }

  }

  </style>
<body>



<?php
  if(isset($_POST['guestName'])) {
    if (!empty($_POST['guestName'])) {
      $_SESSION['loginGuest'] = true;
      $_SESSION['guestName'] = $_POST['guestName'];
    }
  }
  if(isset($_SESSION['loginGuest'])) {
     ?>
    <!-- Chat Gast -->
        <div class="headerBackground">
          <div class="header">
            <div class="headerLogo">
              <img src="assets/img/logo.png" alt="">
            </div>
            <div class="headerMenu">
              <div class="headerMenuLeft">
                <a href="includes/logout.php"> <button type="button" name="button">Logout</button> </a>
              </div>
              <div class="headerMenuRight">
              </div>
            </div>
          </div>
        </div>
        <div class="main">
          <div id="chatOut">
            <div id="output">

            </div>
          </div>
          <div class="chatIn">
            <form class="" action="includes/send.php" method="post">
              <input class="inputText" type="text" name="msg" value="" placeholder="Nachricht.." autofocus>
              <input class="inputButton" type="submit" name="submit" value="Senden" >
            </form>
          </div>
        </div>



  <?php } elseif(isset($_POST['userName'], $_POST['userPwd'])) {
          if (!empty($_POST['userName']) and !empty($_POST['userPwd'])) {
            $_SESSION['loginUser'] = true;
            $_SESSION['userName'] = $_POST['userName'];
          }
        }
        if(isset($_SESSION['loginUser'])) {
     ?>
    <!-- Chat User -->
        <div class="headerBackground">
          <div class="header">
            <div class="headerLogo">
              <img src="assets/img/logo.png" alt="">
            </div>
            <div class="headerMenu">
              <div class="headerMenuLeft">
                <a href="includes/logout.php"> <button type="button" name="button">Logout</button> </a>
              </div>
              <div class="headerMenuRight">
              </div>
            </div>
          </div>
        </div>
        <div class="main">
          <div id="chatOut">
            <div id="output">
              <span class="chatMsg"> <p class="pChatMsgName">Bot</p> </span>
            </div>
          </div>
          <div class="chatIn">
            <form class="" action="chat.php" method="post">
              <input class="inputText" type="text" name="msg" value="" placeholder="Nachricht.." autofocus>
              <input class="inputButton" type="submit" name="submit" value="Senden" >
            </form>
          </div>
        </div>


  <?php }
  elseif(!isset($_SESSION['loginGuest'], $_SESSION['loginUser']) && empty($_SESSION['loginGuest'])) { ?>
    <div class="wrapperLogin">
      <div class="center">
        <img src="assets/img/logo.png" alt="">
      <div class="login">
        <p class="loginLegend">Anmelden:</p>
        <form class="" action="chat.php" method="post">
          <input class="loginInput" type="text" name="userName" value="" placeholder="Benutzername" disabled>
        </br>
          <input class="loginInput" type="password" name="userPwd" value="" placeholder="Passwort" disabled>
        </br>
        <a class="loginLink" href="#">Jetzt registrieren</a>
        <a class="loginLink" href="#">Passwort vergessen..</a>
          <input class="loginButtons" type="submit" name="" value="Als Benutzer anmelden">
        </form>
      </div>
      <div class="loginGast">
        <p class="loginLegend">Ohne Anmeldung:</p>
        <form class="" action="chat.php" method="post">
          <input class="loginInput" type="text" name="guestName" value="" placeholder="Benutzername">
        </br>
          <input class="loginButtons" type="submit" name="" value="Als Gast fortfahren">
        </form>
      </div>
      </div>
    </div>


  <?php }
 ?>

    <script>
    var slider = document.getElementById('chatOut');

    //chat ausgeben
    $(document).ready(function() {
        $("#output").load("chat.txt");
    });
    setInterval(function(){ $("#output").load("chat.txt"); }, 200);


    function toBottom() {
      slider.scrollTop = slider.scrollHeight;
    }

    var bottom = setInterval(toBottom, 200);
    setTimeout(toBottom,50);



    </script>

  </body>
</html>
