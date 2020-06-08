<?php

class Article {
  public function fetch_all() {
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM article ORDER BY id DESC");
    $query->execute();

    return $query->fetchAll();
  }

  public function fetch_all_asc() {
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM article ORDER BY id ASC");
    $query->execute();

    return $query->fetchAll();
  }

  public function fetch_data($article_id) {
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM article WHERE id = ?");
    $query->bindValue(1, $article_id);
    $query->execute();

    return $query->fetch();
  }
}
 ?>
