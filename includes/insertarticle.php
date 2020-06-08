<?php
require("datacon.php");
$time=time();
$sql = "INSERT INTO article (titel, shorttext, contenttext, contentcode, created)
VALUES ('$_POST[articletitel]', '$_POST[articleshorttext]', '$_POST[articlecontenttext]', '$_POST[articlecode]', '$time')";
$pdo->exec($sql);
header('Location: ../admin/index.php');
?>
