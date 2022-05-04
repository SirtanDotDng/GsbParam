<div class="nav">
	<div id="menu">
		<div id="bandeau"> <img id="logo" src="images/logo.png" alt="GsbLogo" title="GsbLogo"/> </div>
		<div><a href="index.php?uc=accueil"> Accueil </a></div>
		<div><a href="index.php?uc=voirProduits&action=voirCategories">Catégories</a></div>
		<div><a href="index.php?uc=voirProduits&action=nosProduits"> Produits </a></div>
		<div><a href="index.php?uc=gererPanier&action=voirPanier"> Mon panier <?php  if(nbProduitsDuPanier() > 0){echo '<e class="nbprod">'.nbProduitsDuPanier().'</e>';}?></a></div>
		<div><a href="index.php?uc=seConnecter&action=voirCompte"> Compte </a></div>
	</div>
</div>