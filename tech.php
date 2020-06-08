<?php
include_once("includes/datacon.php");
include_once("includes/article.php");
$article = new Article;
$articles = $article->fetch_all();
 ?>



<?php include_once('./includes/header.php') ?>

    <div class="navtech">
      <div  id="kategorien"><a href="#">Kategorien</a></div>
      <div id="navtechkat">
        <a href="#">Java</a>
      </div>
      <div id="alphabet"><a href="#">Alphabet</a></div>
      <div id="navtechalpha">
        <a href="#">J</a>
      </div>
    </div>
    <div class="latest">
      <h2>Latest</h2>
      <div class="latestarticle">
        <ul>
          <?php foreach ($articles as $article) { ?>
          <li>
            <h3><a href="article.php?id=<?php echo $article['id']; ?>">
              <?php echo $article['titel']; ?>
            </a></h3>
            <p><?php echo $article['shorttext']; ?></p>
            <a href="article.php?id=<?php echo $article['id']; ?>">Weiterlesen...</a></br>
            <small>Erstellt am: <?php echo date('d m Y', $article['created']) ?></small>
          </li>
        <?php } ?>
      </ul>
      </div>
    </div>

<?php include_once('./includes/footer.php') ?>
