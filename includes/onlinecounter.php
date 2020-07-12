<?php
function onlinecounter($anzahl) {
  // load DB-Connection
  require("datacon.php");
  // Save IP to Variable
  $ip = $_SERVER['REMOTE_ADDR'];
  //Send it to Database - Unique row
  $sql_select = "INSERT INTO onlineusers (ip) VALUES ('$ip')";
  $pdo->exec($sql_select);
  //Get number of Records
  $sql_select_count = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM onlineusers");
  $sql_select_count->execute();
  $count = $sql_select_count->fetch();
  //Return value to function
  return $count['anzahl'];
  }
?>
