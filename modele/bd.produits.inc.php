<?php

/** 
 * Mission 3 : architecture MVC GsbParam
 
 * @file bd.produits.inc.php
 * @author Marielle Jouin <jouin.marielle@gmail.com>
 * @version    2.0
 * @date juin 2021
 * @details contient les fonctions d'accès BD à la table produits
 */
include_once 'bd.inc.php';

	/**
	 * Retourne toutes les catégories sous forme d'un tableau associatif
	 *
	 * @return array $lesLignes le tableau associatif des catégories 
	*/
	function getLesCategories()
	{
		try 
		{
        $monPdo = connexionPDO();
		$req = 'select id, nom from categorie';
		$res = $monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
		} 
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}
	/**
	 * Retourne toutes les informations d'une catégorie passée en paramètre
	 *
	 * @param string $idCategorie l'id de la catégorie
	 * @return array $laLigne le tableau associatif des informations de la catégorie 
	*/
	function getLesInfosCategorie($idCategorie)
	{
		try 
		{
        $monPdo = connexionPDO();
		$req = 'SELECT id, nom FROM categorie WHERE id="'.$idCategorie.'"';
		$res = $monPdo->query($req);
		$laLigne = $res->fetch();
		return $laLigne;
		} 
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}
/**
 * Retourne sous forme d'un tableau associatif tous les produits de la
 * catégorie passée en argument
 * 
 * @param string $idCategorie  l'id de la catégorie dont on veut les produits
 * @return array $lesLignes un tableau associatif  contenant les produits de la categ passée en paramètre
*/

	function getLesProduitsDeCategorie($idCategorie)
	{
		try 
		{
        $monPdo = connexionPDO();
	    $req='select id, nom, image, id_Categorie from produit where id_Categorie ="'.$idCategorie.'"';
		$res = $monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
		} 
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}
/**
 * Retourne les produits concernés par le tableau des idProduits passée en argument
 *
 * @param array $desIdProduit tableau d'idProduits
 * @return array $lesProduits un tableau associatif contenant les infos des produits dont les id ont été passé en paramètre
*/
	function getLesProduitsDuTableau($desIdProduit)
	{
		try 
		{
        $monPdo = connexionPDO();
		$nbProduits = count($desIdProduit);
		$lesProduits=array();
		if($nbProduits != 0)
		{
			foreach($desIdProduit as $unIdProduit)
			{
				$req = 'select id, nom, image, id_Categorie from produit where id = "'.$unIdProduit.'"';
				$res = $monPdo->query($req);
				$unProduit = $res->fetch();
				$lesProduits[] = $unProduit;
			}
		}
		return $lesProduits;
		}
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}
	/**
	 * Crée une commande 
	 *
	 * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
	 * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
	 * tableau d'idProduit passé en paramètre
	 * @param string $nom nom du client
	 * @param string $rue rue du client
	 * @param string $cp cp du client
	 * @param string $ville ville du client
	 * @param string $mail mail du client
	 * @param array $lesIdProduit tableau associatif contenant les id des produits commandés
	 
	*/
	function creerCommande($nom,$rue,$cp,$ville,$mail, $lesIdProduit )
	{
		try 
		{
        $monPdo = connexionPDO();
		// on récupère le dernier id de commande
		$req = 'select max(id) as maxi from commande';
		$res = $monPdo->query($req);
		$laLigne = $res->fetch();
		$maxi = $laLigne['maxi'] ;// on place le dernier id de commande dans $maxi
		$idCommande = $maxi+1; // on augmente le dernier id de commande de 1 pour avoir le nouvel idCommande
		$date = date('Y/m/d'); // récupération de la date système
		$req = "insert into commande values ('$idCommande','$date','$nom','$rue','$cp','$ville','$mail')";
		$res = $monPdo->exec($req);
		// insertion produits commandés
		foreach($lesIdProduit as $unIdProduit)
		{
			$req = "insert into contenir values ('$idCommande','$unIdProduit')";
			$res = $monPdo->exec($req);
		}
		}
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}
	/**
	 * Retourne les produits concernés par le tableau des idProduits passée en argument
	 *
	 * @param int $mois un numéro de mois entre 1 et 12
	 * @param int $an une année
	 * @return array $lesCommandes un tableau associatif contenant les infos des commandes du mois passé en paramètre
	*/
	function getLesCommandesDuMois($mois, $an){

        $monPdo = connexionPDO();
		$req = 'select id, dateCommande, nomPrenomClient, adresseRueClient, cpClient, villeClient, mailClient from commande where YEAR(dateCommande)= '.$an.' AND MONTH(dateCommande)='.$mois;
		$res = $monPdo->query($req);
		$lesCommandes = $res->fetchAll();
		return $lesCommandes;
	}

		/**
	 * Retourne toutes les catégories sous forme d'un tableau associatif
	 *
	 * @return array $lesLignes le tableau associatif des catégories 
	*/
	function getLesProduits(){

        $monPdo = connexionPDO();
		$req = 'select id, nom, image from produit';
		$res = $monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	} 

	function getLeProduit($id){
		$monPdo = connexionPDO();
		$req = "SELECT * FROM produit WHERE id = ?";
		$query = $monPdo -> prepare($req);
		$query -> execute(array($id));
		$res = $query -> fetch();
		
		return $res;
	}

	function getNoteMoyenneProduit($produit){
		$monPdo = connexionPDO();
		$req = "SELECT AVG(Note) AS note FROM note WHERE ID_Produit = ?";
		$query = $monPdo -> prepare($req);
		$query -> execute(array($produit));
		$res = $query -> fetch();

		return $res;
	}

	function getContenanceProduit($produit){
		$monPdo = connexionPDO();
		$req ="SELECT ID, Unite, Quantite, Prix FROM contenance WHERE ID_Produit = ?";
		$query = $monPdo -> prepare($req);
		$query -> execute(array($produit));
		$res = $query -> fetchAll();

		return $res;
	}

	function getContenanceProduitPanier($idContenance){
		$monPdo = connexionPDO();
		$req ="SELECT Unite, Quantite, Prix FROM contenance WHERE ID = ?";
		$query = $monPdo -> prepare($req);
		$query -> execute(array($idContenance));
		$res = $query -> fetch();

		return $res;
	}

	function ajouterAvisProduit($produit, $avis, $note, $user){
		$monPdo = connexionPDO();
		$req ="INSERT INTO note (Note, Avis, ID_Produit, ID_Utilisateur) VALUES (?,?,?,?)";
		$query = $monPdo -> prepare($req);
		$query -> execute(array($note, $avis, $produit, $user));
	}

	function getAvisProduit($produit){
		$monPdo = connexionPDO();
		$req ="SELECT Note, Avis, utilisateur.Nom, utilisateur.Prenom FROM note INNER JOIN utilisateur ON ID_Utilisateur = utilisateur.ID WHERE ID_Produit = ?";
		$query = $monPdo -> prepare($req);
		$query -> execute(array($produit));
		$res = $query -> fetchAll();

		return $res;
	}

	function getAvisProduit2($produit){
		$monPdo = connexionPDO();
		$req = "SELECT Note, Avis, utilisateur.Nom, utilisateur.Prenom FROM note INNER JOIN utilisateur ON ID_Utilisateur = utilisateur.ID WHERE ID_Produit = ? ORDER BY note DESC LIMIT 2";
		$query = $monPdo -> prepare($req);
		$query -> execute(array($produit));
		$res = $query -> fetchAll();

		return $res;
	}

	function newpass($unMail, $unPass){

		$password = password_hash($unPass, PASSWORD_DEFAULT);

		$monPdo = connexionPDO();
		$req = "UPDATE utilisateur SET Password = ? WHERE Mail = ?";
		$query = $monPdo -> prepare($req);
		$query -> execute(array($password, $unMail));	
	}

	function login($unMail, $unPass){

			$monPdo = connexionPDO();
			$req = "SELECT Password FROM utilisateur WHERE Mail = ?";
			$query = $monPdo -> prepare($req);
			$query -> execute(array($unMail));
			$res = $query -> fetch();

			if(password_verify($unPass, $res['Password'])){

			$req = "SELECT ID, Nom, Adresse, Code_Postal, Ville, ID_Role FROM utilisateur WHERE Mail = ?";
			$query = $monPdo -> prepare($req);
			$query -> execute(array($unMail));
			$res = $query -> fetch();

			if($res){
				$_SESSION['id'] = $res['ID'];
				$_SESSION['role'] = $res['ID_Role'];
				$_COOKIE['nom'] = $res['Nom'];
				$_COOKIE['adresse'] = $res['Adresse'];
				$_COOKIE['cp'] = $res['Code_Postal'];
				$_COOKIE['ville'] = $res['Ville'];
			}
		}
	}

	function register($nom, $prenom, $mail, $password1, $password2, $telephone, $adresse, $ville, $cp){

		if($password1 == $password2) {
			$password = password_hash($password1, PASSWORD_DEFAULT);
			$monPdo = connexionPDO();
			$req = "INSERT INTO utilisateur (Nom, Prenom, Telephone, Code_Postal, Ville, Adresse, Mail, Password, ID_Role) VALUES (?,?,?,?,?,?,?,?,2)";
			$query = $monPdo -> prepare($req);
			$query -> execute(array($nom, $prenom, $telephone, $cp, $ville, $adresse, $mail, $password));
		}
	}

	function getProductId(){

		$monPdo = connexionPDO();
		$req = "SELECT ID FROM produit";
		$res = $monPdo -> query($req);
		$lignes = $res -> fetchAll();

		$i = 0;
		$id = 0;
		$stop = false;
		foreach($lignes as $ligne){
			if(!isset($ligne) && !$stop){
				$id = $i;
				$stop = true;
			}
			$i++;
		}
		return $id;
	}

	function newProduct($nom, $description, $marque, $categorie, $quantite, $image){

		$monPdo = connexionPDO();
		$req = "INSERT INTO produit (ID, Nom, Image, Description, Quantite, ID_Marque, ID_Categorie) VALUES (?,?,?,?,?,?,?)";
		$query = $monPdo -> prepare($req);
		$query -> execute(array(getProductId() ,$nom, $image, $description, $quantite, $marque, $categorie));
	}

	function insertContenance($unite, $quantite, $prix){

		$monPdo = connexionPDO();
		$req = "INSERT INTO contenance (Unite, Quantite, Prix, ID_Produit) VALUES (?,?,?,?)";
		$query = $monPdo -> prepare($req);
		$query -> execute(array($unite, $quantite, $prix, (getProductId()-1)));
	}

	function isLogged() {

		$connected = false;
		if(isset($_SESSION['id'])){
			$connected = true;
		}
		return $connected;
	}

	function isAdmin() {

		$admin = false;
		if($_SESSION['role'] == 1){
			$admin = true;
		}
		return $admin;
	}
	
	function deconnexion() {
		session_unset();
		session_destroy();
		echo "<script>location.href='index.php?uc=accueil';</script>";
	}
	
	function getCompte($id){
			$monPdo = connexionPDO();
			$req = "SELECT Nom, Prenom, Telephone, Code_Postal, Ville, Adresse, Mail FROM utilisateur WHERE ID = ?";
			$query = $monPdo -> prepare($req);
			$query -> execute(array($id));
			$res = $query -> fetch();
			
			return $res;
	}

	function getLesMarques(){
		$monPdo = connexionPDO();
		$req = "SELECT ID, Nom FROM marque";
		$res = $monPdo->query($req);
		$lesLignes = $res->fetchAll();
		
		return $lesLignes;
	}
?>