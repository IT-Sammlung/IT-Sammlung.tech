<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT-Sammlung.tech</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <?php
    include_once("onlinecounter.php");
    include_once("settings.php");
   ?>
<div class="wrapper">
  <div id="header">
    <div id="wartung"> <p>Seite unter Wartungsarbeiten....</p> </div>
    <div class="logo">
      <a href="index.php"><img src="./favicon/logo.png" alt="" class="logoimage"></a>
      <a href="index.php">IT-Sammlung</a>
    </div>
<div id="hamburger">
<i id="hamburgericon" class="fa fa-bars"></i>
</div>
<div class="clearfix"></div>
<div id="nav">
<div id="subnav">
  <p>Artikel</p>
<div id="subnavcontent">
  <a href="tech.php">.tech</a>
  <a href="blog.php">Blog</a>
</div>
</div>
</div>
  </div>
  <div id="main">
<script type="text/javascript">
var wartung = <?php echo $wartung; ?>;
if(wartung == 1) {
  document.getElementById("wartung").style.display = "block";
  document.getElementById("main").style.paddingTop = "98px";
}
</script>
