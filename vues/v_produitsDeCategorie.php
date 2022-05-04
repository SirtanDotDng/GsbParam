<?php	

$action = $_REQUEST['categorie'];
switch($action)
{
	case '1':
	{
  		$categorie = "cheveux" ;
		break;
	}
	case '2' :
	{
		$categorie = "forme" ;
		break;
	}
	case '3' :
	{
		$categorie = "protection solaire" ;
		break;
	}
}
?>

<h1> Produits de la catégorie <?php echo $categorie ?> </h1>

<div id="produits">
<?php
// parcours du tableau contenant les produits à afficher
foreach( $lesProduits as $unProduit) 
{ 	// récupération des informations du produit
	$id = $unProduit['id'];
	$nom = $unProduit['nom'];
	$prix=$unProduit['prix'];
	$image = $unProduit['image'];
	// affichage d'un produit avec ses informations
	?>	
	<div onClick="window.location = 'index.php?uc=voirProduits&produit=<?php echo $id ?>&action=voirDetailsProduit" class="card">
			<div class="photoCard"><img src="<?php echo $image ?>" alt=image /></div>
			<div class="descrCard"><?php echo $nom ?></div>
			<div class="prixCard"><?php echo $prix."€" ?></div>
			<div class="imgCard"><a class="tocart" href="index.php?uc=voirProduits&produit=<?php echo $id ?>&action=ajouterAuPanier">Voir Produit</a></div>
	</div>
<?php			
} // fin du foreach qui parcourt les produits
?>
</div>
