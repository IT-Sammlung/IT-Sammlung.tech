<?php
function onlinecounter() {
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

  function totalhits() {
    // load DB-Connection
    require("datacon.php");
    // Save IP to Variable
    $ip = $_SERVER['REMOTE_ADDR'];
    //Send it to Database - Unique row
    $sql_select = "INSERT INTO totalhits (ip) VALUES ('$ip')";
    $pdo->exec($sql_select);
    //Get number of Records
    $sql_select_count = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM totalhits");
    $sql_select_count->execute();
    $count = $sql_select_count->fetch();
    //Return value to function
    return $count['anzahl'];
    }

    function totalhitsweek() {
      // load DB-Connection
      require("datacon.php");
      //Get number of Records
      $sql_select_count = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM totalhits WHERE timestmp BETWEEN SYSDATE() - INTERVAL 7 DAY AND SYSDATE()");
      $sql_select_count->execute();
      $count = $sql_select_count->fetch();
      //Return value to function
      return $count['anzahl'];
      }
?>
