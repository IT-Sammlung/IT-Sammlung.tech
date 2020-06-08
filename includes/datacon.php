<?php
try {
$pdo = new PDO('mysql:host=localhost;dbname=cms', 'admin', 'admin');
} catch (PDOException $e) {
  exit('Database error.');
}
?>
