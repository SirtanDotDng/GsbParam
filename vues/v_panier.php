<h1>Mon Panier</h1>
<div id="produits">
<?php

foreach( $lesProduitsDuPanier as $unProduit) 
{
	// récupération des données d'un produit
	$id = $unProduit['id'];
	$nom = $unProduit['nom'];
	$image = $unProduit['image'];
	$prix = $unProduit['prix'];
	// affichage
?>
	<div class="card">
		<div class="photoCard"><img src="<?php echo $image ?>" alt="image descriptive" /></div>
		<div class="descrCard"><?php echo	$nom;?>	</div>
		<div class="prixCard"><?php echo $prix."€" ?></div>
		<div class="imgCard"><a class="tocart" href="index.php?uc=gererPanier&produit=<?php echo $id ?>&action=supprimerUnProduit" onclick="return confirm('Voulez-vous vraiment retirer cet article ?');">Supprimer</a></div>
	</div>
<?php
}
?>
<div class="commande">
<a class="cart" href="index.php?uc=gererPanier&action=passerCommande">Commander <i class="fa-solid fa-cart-shopping"></i></a>
</div>
<br/>
