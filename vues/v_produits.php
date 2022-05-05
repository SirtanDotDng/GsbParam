<h1>Produits</h1>
<div id="produits">

<?php
foreach( $lesProduits as $unProduit) {
	$id = $unProduit['id'];
	$nom = $unProduit['nom'];
	$image = $unProduit['image'];
?>	
	<div onClick="window.location = 'index.php?uc=voirProduits&produit=<?php echo $id ?>&action=voirDetailsProduit" class="card">
			<div class="photoCard"><img src="<?php echo $image ?>" alt=image /></div>
			<div class="descrCard"><?php echo $nom ?></div>
			<div class="imgCard"><a class="tocart" href="index.php?uc=voirProduits&produit=<?php echo $id ?>&action=voirProduit">Voir Produit</a></div>
	</div>
<?php			
}
?>
</div>
