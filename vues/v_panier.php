<section style="display:flex; justify-content:space-around">
<div id="produits">
<h1 style="width:100%">Mon Panier</h1>
<div>
<?php
$i = 0;
foreach( $lesProduitsDuPanier as $unProduit) 
{
	// récupération des données d'un produit
	$id = $unProduit['id'];
	$nom = $unProduit['nom'];
	$image = $unProduit['image'];
	$quantite = $_SESSION['quantite'][$i];
	$idContenance = $_SESSION['contenance'][$i];
	$contenance = getContenanceProduitPanier($idContenance);
	// affichage
?>
	<div class="card">
		<div class="quantite"><?php echo $quantite;?></div>
		<div class="photoCard"><img src="<?php echo $image ?>" alt="image descriptive" /></div>
		<div class="descrCard"><?php echo $nom." | ".$contenance['Quantite']." ".$contenance['Unite'];?></div>
		<div class="prixCard"><?php echo $contenance['Prix']."€";?></div>
		<div class="toTrash"><a class="tocart" href="index.php?uc=gererPanier&produit=<?php echo $id ?>&action=supprimerUnProduit" onclick="return confirm('Voulez-vous vraiment retirer cet article ?');">Supprimer</a></div>
	</div>
<?php
	$i++;
}
?>
</div>
</div>

<div class="panier">
	<h1>Total panier</h1>
		<div>
			<?php
			$i=0;
			$total = 0;
			foreach ( $lesProduitsDuPanier as $unProduit ) {
				$nom = $unProduit['nom'];
				$quantite = $_SESSION['quantite'][$i];
				$idContenance = $_SESSION['contenance'][$i];
				$contenance = getContenanceProduitPanier($idContenance);
				$total += round($quantite * $contenance['Prix'],2);
				$i++;

				echo "<div class='unAvis' style='margin-bottom:5%;'>".$nom." | <a class='prix'>".round($quantite * $contenance['Prix'],2)."€</a></div>";
			}
			echo "<div class='hline'></div>";
			echo "<div class='prix'>Total | ".$total."€</div>";?>
			<br>
			<div class="commande">
				<a class="button" href="index.php?uc=gererPanier&action=passerCommande">Commander</a>
			</div>
		</div>
</section>