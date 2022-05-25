<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirPanier':
	{
		$n= nbProduitsDuPanier();
		if($n >0)
		{
			$desIdProduit = getLesIdProduitsDuPanier();
			$lesProduitsDuPanier = getLesProduitsDuTableau($desIdProduit);
			include("vues/v_panier.php");
		}
		else
		{
			$message = "Votre panier ne contient pas de produits";
			include ("vues/v_message.php");
		}
		break;
	}
	case 'supprimerUnProduit':
	{
		$idProduit=$_REQUEST['produit'];
		retirerDuPanier($idProduit);
		$desIdProduit = getLesIdProduitsDuPanier();
		$lesProduitsDuPanier = getLesProduitsDuTableau($desIdProduit);
		include("vues/v_panier.php");
		break;
	}
	case 'passerCommande':
	    $n= nbProduitsDuPanier();
		if($n>0 && isLogged())
		{   // les variables suivantes servent à l'affectation des attributs value du formulaire
			// ici le formulaire doit être vide, quand il est erroné, le formulaire sera réaffiché pré-rempli
			$nom = $_SESSION['nom'] ;$rue = $_SESSION['adresse'] ;$ville = $_SESSION['ville'] ;$cp = $_SESSION['cp']; $mail = $_SESSION['mail'];
			include ("vues/v_commande.php");
		}
		else
		{
			if(isLogged()){
				$message = "Votre panier ne contient pas de produits";
				include ("vues/v_message.php");
			}
			else
			{
				$message = "Vous devez vous connecter pour passer commande.";
				include ("vues/v_message.php"); 
			}
		}
		break;
	case 'confirmerCommande':
	{
		$nom = $_POST['nom']; $rue = $_POST['rue']; $cp = $_POST['cp']; $ville = $_POST['ville']; $mail = $_POST['mail'];
	 	$msgErreurs = getErreursSaisieCommande($nom,$rue,$ville,$cp,$mail);
		if (count($msgErreurs)!=0)
		{
			include ("vues/v_erreurs.php");
			include ("vues/v_commande.php");
		}
		else
		{
			creerCommande($nom,$rue,$cp,$ville,$mail);
			$lesProduits = getLesProduitsDuPanier();
			foreach ($lesProduits as $leProduit){
				$idProduit = $leProduit[0];
				$quantite = $leProduit[1];
				$contenance = $leProduit[2];
				AttribuerCommande($idProduit,$quantite,$contenance);
			}
			$message = "Commande enregistrée";
			supprimerPanier();
			include ("vues/v_message.php");
		}
		break;
	}
}
?>