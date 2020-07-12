<?php
// include dependencies
session_start();
include_once('../includes/datacon.php');
include_once("../includes/article.php");
if (isset($_SESSION['logged_in'])) {

// create new array from select * from article ascending
  $article = new Article;
  $articles = $article->articles_asc();
?>

<!-- Dropdown to select an article / Loop through array -->
<?php include_once('headeradmin.php') ?>
    <h3>Artikel auswählen</h3>
      <form action="editarticle.php" method="get">
        <select name="id">
          <?php foreach ($articles as $article) { ?>
          <option value="<?php echo $article['id']; ?>"><?php echo $article['titel']; ?></option>
        <?php } ?>
        </select>
        <input type="submit" value="submit">
      </form>

<!-- If an article is selected from the dropdown show the fields -->
      <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // create an object referenced by the id
        $article = new Article;
        $data = $article->fetch_article($id);
        ?>
        <h3>Artikel bearbeiten</h3>
        <form action="../includes/editarticle.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
          <p>Titel</p>
            <p>
                <textarea rows="1" cols="30" name="articletitel" id="articletitel" placeholder="Titel"><?php echo $data['titel'] ?></textarea>
            </p>
            <p>Fronttext</p>
            <p>
                <textarea rows="1" cols="30" name="articleshorttext" id="articleshorttext" placeholder="Kurzbeschreibung für Startseite"><?php echo $data['shorttext'] ?></textarea>
            </p>
            <p>Haupttext</p>
            <p>
                <textarea rows="5" cols="30" name="articlecontenttext" id="articlecontenttext" placeholder="Inhalt"><?php echo $data['contenttext'] ?></textarea>
            </p>
            <p>Source Code</p>
            <p>
                <textarea rows="5" cols="30" name="articlecode" id="articlecode" placeholder="Source Code"><?php echo $data['contentcode'] ?></textarea>
            </p>
            <input type="file" name="articleimage" id="articleimage"></br>
            <input type="submit" value="Submit" name="submit">
        </form>

<!-- Show current image name and button to delete image from file server -->
        <h3>Image (16:9)</h3>
        <p>Now: <?php echo $data['articleimage'] ?></p>
        <form method="post" action="">
          <?php
            if(isset($_POST['deleteimage'])) {
              $filepath = "../uploads/images/" . $data['articleimage'];
              unlink($filepath);
            }
           ?>
           <input type="submit" name="deleteimage" value="Delete">
        </form>

        <h3>Kategorie (front, tech, blog)</h3>
        <form action="../includes/editarticle.php?id=<?php echo $id ?>" method="post">
          <textarea name="articlecategory" rows="1" cols="30" id="articlecategory" placeholder="<?php echo $data['category'] ?>"></textarea></br>
          <input type="submit" name="submitcateory" value="Submit">
        </form>
<!-- End part -->
        <?
      } else {
        echo "Bitte Artikel auswählen!";
      }
      ?>
<?php include_once('footeradmin.php') ?>
<?php
} else {
  header('Location: index.php');
}
 ?>
