<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'formConnexion':
	{
		include("vues/v_connexion.php");
  		break;
	}
	case 'checkConnexion' :
	{
		seConnecter($_POST["mail"], $_POST["password"]);
	}
	case 'nosProduits' :
	{
		$lesProduits = getLesProduits();
		include("vues/v_produits.php");
		break;
	}
	case 'ajouterAuPanier' :
	{
		$idProduit=$_REQUEST['produit'];
		
		$ok = ajouterAuPanier($idProduit);
		if(!$ok)
		{
			$message = "Cet article est déjà dans le panier !!";
			include("vues/v_message.php");
		}
		else{
		// on recharge la même page ( NosProduits si pas categorie passée dans l'url')
		if (isset($_REQUEST['categorie'])){
			$categorie = $_REQUEST['categorie'];
			header('Location:index.php?uc=voirProduits&action=voirProduits&categorie='.$categorie);
		}
		else 
			header('Location:index.php?uc=voirProduits&action=nosProduits');
		}
		break;
	}
}
?>