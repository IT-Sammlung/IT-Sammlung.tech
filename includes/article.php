<?php

/* /article.php */
class Article {
  public function articles_desc() {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM article ORDER BY id DESC");
    $query->execute();
    return $query->fetchAll();
  }
/* /gives articles for /tech.php */
  public function articles_tech_desc() {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM article WHERE category = 'tech' ORDER BY id DESC");
    $query->execute();
    return $query->fetchAll();
  }

  /* /gives articles for /index.php */
    public function articles_front_desc() {
      global $pdo;
      $query = $pdo->prepare("SELECT * FROM article WHERE category = 'front' ORDER BY id DESC");
      $query->execute();
      return $query->fetchAll();
    }

    /* /gives articles for /index.php */
      public function articles_front_last_desc() {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM article WHERE category = 'tech' OR category = 'blog' ORDER BY id DESC");
        $query->execute();
        return $query->fetchAll();
      }

    /* /gives articles for /blog.php */
      public function articles_blog_desc() {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM article WHERE category = 'blog' ORDER BY id DESC");
        $query->execute();
        return $query->fetchAll();
      }

      /* /gives articles for /blog.php */
        public function articles_test() {
          global $pdo;
          $query = $pdo->prepare("SELECT * FROM onlineusers");
          $query->execute();
          return $query->fetchAll();
        }

/* /admin/deletearticle.php+editarticle.php */
  public function articles_asc() {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM article ORDER BY id ASC");
    $query->execute();
    return $query->fetchAll();
  }

/* /article.php */
  public function fetch_article($article_id) {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM article WHERE id = ?");
    $query->bindValue(1, $article_id);
    $query->execute();
    return $query->fetch();
  }
}
 ?>
