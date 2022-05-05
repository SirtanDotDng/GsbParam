<?php
// contrôleur qui gère l'affichage des produits
initPanier();// se charge de réserver un emplacement mémoire pour le panier si pas encore fait
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirCategories':
	{
  		$lesCategories = getLesCategories();
		include("vues/v_categories.php");
  		break;
	}
	case 'voirProduits' :
	{
		$lesCategories = getLesCategories();
		include("vues/v_categories.php");
  		$categorie = $_REQUEST['categorie'];
		$lesProduits = getLesProduitsDeCategorie($categorie);
		include("vues/v_produitsDeCategorie.php");
		break;
	}
	case 'voirProduit' :
		{
			$id = $_GET['produit'];
			$leProduit = getLeProduit($id);
			$note = getNoteMoyenneProduit($id);
			$notei = (int) $note['note'];
			$notef = floatval($note['note']);
			$lesContenances = getContenanceProduit($id);
			include("vues/v_produit.php");
			break;
		}
	case 'ajouterAvis' :
		{
			$id = $_GET['produit'];
			$lesAvis = ajouterAvisProduit($id, $_POST['avis'], $_POST['note'], $_SESSION['id']);
			include("vues/v_ajoutAvis.php");
			break;
		}
	case 'voirAvis' :
		{
			$id = $_GET['produit'];
			$lesAvis = getAvisProduit($id);
			include("vues/v_avis.php");
			break;
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
		
		$ok = ajouterAuPanier($idProduit, $_POST['quantite'],$_POST['contenance']);
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

