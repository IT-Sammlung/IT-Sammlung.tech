<?php
include_once("includes/datacon.php");
include_once("includes/article.php");
$article = new Article;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data = $article->fetch_data($id);
  ?>

  <?php
  include_once("includes/datacon.php");
  include_once("includes/article.php");
  $article = new Article;
  $articles = $article->fetch_all();
   ?>

<?php include_once('./includes/header.php') ?>
      <h3><?php echo $data['titel'] ?></h4>
        <p><?php echo nl2br($data['contenttext']); ?></p>
        <?php if (!empty($data['contentcode'])) { ?>
          <h4>Quellcode: </h4>
          <pre><?php echo ($data['contentcode']); ?></pre>
        <small>Erstellt am: <?php echo date('d m Y', $data['created']) ?></small>
          <?php
        } ?>
<?php include_once('./includes/footer.php') ?>

  <?php

} else {
  header('Location: tech.php');
  exit();
}

 ?>
