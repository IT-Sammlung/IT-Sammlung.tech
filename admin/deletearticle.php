<?php
// load dependencies
session_start();
include_once('../includes/datacon.php');
include_once("../includes/article.php");
if (isset($_SESSION['logged_in'])) {

// create array with sql statement select * from article ascending to give it the dropdown menu
  $article = new Article;
  $articles = $article->articles_asc();

// delete the image from the fileserver
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $article->fetch_article($id);
    $filepath = "../uploads/images/" . $data['articleimage'];
    unlink($filepath);
  }

// if the article is selected and submitted it will delete it, identified through the id, then go back go same page
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $pdo->prepare('DELETE FROM article WHERE id = ?');
    $query->bindValue(1, $id);
    $query->execute();
    header('Location: deletearticle.php');
  }
?>

<!-- Dropdown form with all objects from the array -->
<?php include_once('headeradmin.php') ?>
  <div class="adminwrapper">
    <h3>Artikel Löschen</h3>
      <form action="deletearticle.php" method="get">
        <select name="id">
          <?php foreach ($articles as $article) { ?>
          <option value="<?php echo $article['id']; ?>"><?php echo $article['titel']; ?></option>
        <?php } ?>
        </select>
        <input type="submit" value="submit">
      </form>
    </div>
<!-- Footer -->
<?php include_once('footeradmin.php') ?>
<?php
} else {
  header('Location: index.php');
}
 ?>
