<?php
// load dependencies
require("datacon.php");

/* Image File Upload https://www.w3schools.com/php/php_file_upload.asp */
if(isset($_POST['submit'], $_FILES['articleimage']['name'])) {
  $target_dir = "../uploads/images/";
  $filename = $_FILES['articleimage']['name'];
  $target_file = $target_dir . basename($_FILES["articleimage"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["articleimage"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  // Check file size
  if ($_FILES["articleimage"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["articleimage"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["articleimage"]["name"]). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

// Update Database record
if(isset($_POST['submit'])) {
  if($_FILES['articleimage']['name'] !== ""){
  $time=time();
  $id = $_GET['id'];
  $sql = "UPDATE article SET titel = '$_POST[articletitel]', shorttext = '$_POST[articleshorttext]', contenttext = '$_POST[articlecontenttext]', contentcode = '$_POST[articlecode]', articleimage = '$filename', edited = $time WHERE id = $id";
  $pdo->exec($sql);
}
if($_FILES['articleimage']['name'] == ""){
$time=time();
$id = $_GET['id'];
$sql = "UPDATE article SET titel = '$_POST[articletitel]', shorttext = '$_POST[articleshorttext]', contenttext = '$_POST[articlecontenttext]', contentcode = '$_POST[articlecode]', edited = $time WHERE id = $id";
$pdo->exec($sql);
}
}



// Update Category
if(isset($_POST['submitcateory'])) {
  $id = $_GET['id'];
  $sql = "UPDATE article SET category = '$_POST[articlecategory]' WHERE id = $id";
  $pdo->exec($sql);
}
header('Location: ../admin/index.php');
?>
