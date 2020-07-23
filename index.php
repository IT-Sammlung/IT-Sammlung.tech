<?php
// Load dependencies
include_once("includes/datacon.php");
include_once("includes/article.php");
// Create new object with select * from article where category front ascending
$articlefront = new Article;
$articlesfront = $articlefront->articles_front_desc();
$articlelast = new Article;
$articleslast = $articlelast->articles_front_last_desc();
 ?>
<!-- Include HTML Header -->
<?php include_once('./includes/header.php') ?>
<!-- Insert Article -->
<div class="latest">
  <div class="latestarticle">
      <?php foreach ($articlesfront as $articlefront) { ?>
        <div class="article">
        <div class="articleheader">
          <div class="articlepic"> <a href="article.php?id=<?php echo $articlefront['id']; ?>"><img src="uploads/images/<?php echo ($articlefront['articleimage']); ?>" alt="frontpic" class="frontpictech"></a> </div>
          <div class="articletitel"> <img src="assets/img/pin.png" alt="" id="pin"> <a href="article.php?id=<?php echo $articlefront['id']; ?>"> <?php echo $articlefront['titel']; ?> </a> </div>
        </div>
        <div class="articletext"> <p><?php echo $articlefront['shorttext']; ?></p> </div>
        <div class="articlereadmore"> <?php if($articlefront['contenttext'] !== "") { ?> <a href="article.php?id=<?php echo $articlefront['id']; ?>">Weiterlesen...</a> <?php } ?> </div>
        <div class="articlecreated"> <small>Created: <?php echo date('d m Y', $articlefront['created']) ?></small> </div>
        <div class="articleedited"> <?php if(isset($articlefront['edited'])) { ?> <small>Edited: <?php echo date('d m Y', $articlefront['edited']) ?></small> <?php } ?> </div>
                <div class="articlecategory"> <small>Category: <?php echo "news" ?></small> </div>
        </br>
      </div>
    <?php } ?>
  </div>
</div>

<!-- Insert Article -->
<div class="latest">
  <div class="latestarticle">
      <?php foreach ($articleslast as $articlelast) { ?>
        <div class="article">
        <div class="articleheader">
          <div class="articlepic"> <a href="article.php?id=<?php echo $articlelast['id']; ?>"><img src="uploads/images/<?php echo ($articlelast['articleimage']); ?>" alt="frontpic" class="frontpictech"></a> </div>
          <div class="articletitel"> <a href="article.php?id=<?php echo $articlelast['id']; ?>"> <?php echo $articlelast['titel']; ?> </a> </div>
        </div>
        <div class="articletext"> <p><?php echo $articlelast['shorttext']; ?></p> </div>
        <div class="articlereadmore"> <?php if($articlelast['contenttext'] !== "") { ?> <a href="article.php?id=<?php echo $articlelast['id']; ?>">Weiterlesen...</a> <?php } ?> </div>
        <div class="articlecreated"> <small>Created: <?php echo date('d m Y', $articlelast['created']) ?></small> </div>
        <div class="articleedited"> <?php if(isset($articlelast['edited'])) { ?> <small>Edited: <?php echo date('d m Y', $articlelast['edited']) ?></small> <?php } ?> </div>
        <div class="articlecategory"> <small>Category: <?php echo $articlelast['category'] ?></small> </div>
        </br>
      </div>
    <?php } ?>
  </div>
</div>



<!-- Include HTML Footer -->
<?php include_once('./includes/footer.php') ?>
