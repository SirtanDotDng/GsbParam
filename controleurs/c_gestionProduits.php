<?php
// contrôleur qui gère l'affichage des produits
$action = $_REQUEST['action'];
switch($action)
{
	case 'gestionProduits':
	{
		$lesProduits = getLesProduits();
		include("vues/v_gererProduits.php");
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

	case 'nosProduits' :
	{
		$lesProduits = getLesProduits();
		include("vues/v_produits.php");
		break;
	}

	case 'ajouterProduit' :
		{
			$lesCategories = getLesCategories();
			$lesMarques = getLesMarques();
			include("vues/v_newProduit.php");
			break;
		}

	case 'insertProduit' :
		{
			$message = "Il y a eu une erreur lors de l'envoi de la requête. ";
			$target_dir = "images/";
			$target_file = $target_dir . basename($_FILES["illustration"]["name"]);
			$upload = 1;
			$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["illustration"]["tmp_name"]);
				if($check !== false) {
					$upload = 1;
				} else {
					$upload = 0;
					$message =$message." Ce n'est pas une image. ";
				}
			}

			if (file_exists($target_file)) {
			$upload = 0;
			$message = $message." Destination du fichier invalide. ";
			}

			if ($_FILES["illustration"]["size"] > 512000) {
			$upload = 0;
			$message = $message." Image trop imposante. ";
			}

			if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
			$upload = 0;
			$message = $message." Format de fichier non supporté. ";
			}

			if (move_uploaded_file($_FILES["illustration"]["tmp_name"], $target_file) && $upload == 1) {
				$message = "Le produit a bien été envoyé.";
				newProduct($_POST['nom'], $_POST['description'], $_POST['marque'],$_POST['categorie'], $_POST['quantite'], $target_file);
			}
			include("vues/v_insertProduit.php");
			break;
		}

	case 'ajouterAuPanier' :
	{
		$idProduit=$_REQUEST['produit'];
		
		$ok = ajouterAuPanier($idProduit, $_POST['quantite'], $_POST['contenance']);
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

