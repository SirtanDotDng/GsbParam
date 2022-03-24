<?php include('../controleurs/c_voirProduits.php');?>
<?php include('../vues/v_categories.php');?>
<?php 
initPanier();
$categories = getLesCategories();
echo getLesCategories() ?>