<?php
session_start();

include_once('../includes/datacon.php');
include_once("../includes/article.php");
$article = new Article;
$articles = $article->fetch_all_asc();

if (isset($_SESSION['logged_in'])) {
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $pdo->prepare('DELETE FROM article WHERE id = ?');
    $query->bindValue(1, $id);
    $query->execute();
    header('Location: deletearticle.php');
  }
?>
<?php include_once('headeradmin.php') ?>
    <h3>Artikel Löschen</h3>
      <form action="deletearticle.php" method="get">
        <select onchange="this.form.submit();" name="id">
          <?php foreach ($articles as $article) { ?>
          <option value="<?php echo $article['id']; ?>"><?php echo $article['titel']; ?></option>
        <?php } ?>
        </select>
      </form>
<?php include_once('footeradmin.php') ?>
<?php
} else {
  header('Location: index.php');
}
 ?>
