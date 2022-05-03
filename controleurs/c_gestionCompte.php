<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'formConnexion':
	{
		include("vues/v_connexion.php");
  		break;
	}
	case 'checkConnexion':
	{
		echo(login($_POST["mail"], $_POST["password"]));
		break;
	}
	case 'nosProduits':
	{
		$lesProduits = getLesProduits();
		include("vues/v_produits.php");
		break;
	}
	case 'ajouterAuPanier':
	{
		$idProduit = $_REQUEST['produit'];
		
		$ok = ajouterAuPanier($idProduit);
		if(!$ok)
		{
			$message = "Cet article est déjà dans le panier !!";
			include("vues/v_message.php");
		}
		else{
		if (isset($_REQUEST['categorie'])){
			$categorie = $_REQUEST['categorie'];
			header('Location:index.php?uc=voirProduits&action=voirProduits&categorie='.$categorie);
		}
		else 
			header('Location:index.php?uc=voirProduits&action=nosProduits');
		}
		break;
	}

	case 'voirCompte':
		{
			$lesLignes = getCompte($_SESSION["id"]);
			$nom = $lesLignes['Nom'];
			$prenom = $lesLignes['Prenom'];
			$telephone = $lesLignes['Telephone'];
			$cp = $lesLignes['Code_Postal'];
			$ville = $lesLignes['Ville'];
			$adresse = $lesLignes['Adresse'];
			$mail = $lesLignes['Mail'];
			include("vues/v_voirCompte.php");
			break;
		}
}
?>