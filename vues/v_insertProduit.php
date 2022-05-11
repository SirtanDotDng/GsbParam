<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["illustration"]["name"]);
$upload = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["illustration"]["tmp_name"]);
  if($check !== false) {
    $upload = 1;
  } else {
    $upload = 0;
  }
}

if (file_exists($target_file)) {
  $upload = 0;
}

if ($_FILES["illustration"]["size"] > 512000) {
  $upload = 0;
}

if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
  $upload = 0;
}

if (move_uploaded_file($_FILES["illustration"]["tmp_name"], $target_file) && $upload == 1) {
    echo "Le produit a bien été envoyé.";
    newProduct($_POST['nom'], $_POST['description'], $_POST['marque'],$_POST['categorie'], $_POST['quantite'], $target_file);
  } else {
    echo "Il y a eu une erreur lors de l'envoi de la requête.";
}
?>