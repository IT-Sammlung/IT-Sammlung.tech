<?php
include_once("includes/datacon.php");
include_once("includes/article.php");
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $article = new Article;
  $data = $article->fetch_article($id);
  ?>

  <?php
  include_once("includes/datacon.php");
  include_once("includes/article.php");
  $article = new Article;
  $articles = $article->articles_desc();
   ?>

<?php include_once('./includes/header.php') ?>
<div class="article">
  <h3><?php echo $data['titel'] ?></h3>
    <img src="uploads/images/<?php echo ($data['articleimage']); ?>" alt="frontpic" class="frontpic">
    <h4><?php echo nl2br($data['shorttext']);?></h4>
    <p><?php echo nl2br($data['contenttext']); ?></p>
    <?php if (!empty($data['contentcode'])) { ?>
      <h4>Quellcode: </h4>
      <pre><?php echo ($data['contentcode']); ?></pre>
      <?php } ?>
    <small>Created: <?php echo date('d m Y', $data['created']) ?></small></br>
    <?php if(isset($data['edited'])) { ?>
    <small>Edited: <?php echo date('d m Y', $data['edited']) ?></small>
  <?php } ?>
</div>
<?php include_once('./includes/footer.php') ?>

  <?php

} else {
  header('Location: tech.php');
  exit();
}

 ?>
