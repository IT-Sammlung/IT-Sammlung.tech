<?php
// Load dependencies
include_once("includes/datacon.php");
include_once("includes/article.php");
// Create new object with select * from article where category front ascending
$article = new Article;
$articles = $article->articles_front_desc();
 ?>
<!-- Include HTML Header -->
<?php include_once('./includes/header.php') ?>
<!-- Insert Article -->
<div class="latest">
  <div class="latestarticle">
      <?php foreach ($articles as $article) { ?>
        <div class="article">
        <div class="articleheader">
          <div class="articlepic"> <a href="article.php?id=<?php echo $article['id']; ?>"><img src="uploads/images/<?php echo ($article['articleimage']); ?>" alt="frontpic" class="frontpictech"></a> </div>
          <div class="articletitel"> <a href="article.php?id=<?php echo $article['id']; ?>"> <?php echo $article['titel']; ?> </a> </div>
        </div>
        <div class="articletext"> <p><?php echo $article['shorttext']; ?></p> </div>
        <div class="articlereadmore"> <?php if($article['contenttext'] !== "") { ?> <a href="article.php?id=<?php echo $article['id']; ?>">Weiterlesen...</a> <?php } ?> </div>
        <div class="articlecreated"> <small>Created: <?php echo date('d m Y', $article['created']) ?></small> </div>
        <div class="articleedited"> <?php if(isset($article['edited'])) { ?> <small>Edited: <?php echo date('d m Y', $article['edited']) ?></small> <?php } ?> </div>
        </br>
      </div>
    <?php } ?>
  </div>
</div>
<!-- Include HTML Footer -->
<?php include_once('./includes/footer.php') ?>
