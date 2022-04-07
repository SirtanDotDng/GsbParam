<?php
session_start();
include("vues/v_entete.html") ;
require_once("modele/fonctions.inc.php");
require_once("modele/bd.produits.inc.php");

if(isLogged() && isAdmin()){
	include("vues/v_bandeauAdmin.html");
}
else{
	if(isLogged()){
		include("vues/v_bandeauLogged.html");
	}
	else{
		include("vues/v_bandeau.html");	
	}
}

if(isset($_REQUEST['uc'])) {   
	$uc = $_REQUEST['uc'];
}
else {
	$uc = 'accueil';
}

switch($uc)
{
	case 'accueil': {
		include("vues/v_accueil.html");
		break;
	}
	case 'voirProduits' : {
		include("controleurs/c_voirProduits.php");
		break;
	}
	case 'gererPanier' : { 
		include("controleurs/c_gestionPanier.php");
		break;
	}
	case 'administrer' : { 
		include("controleurs/c_gestionProduits.php");
		break;  
	}
	case 'seConnecter' : { 
		include("controleurs/c_gestionCompte.php");
		break;  
	}
}
include("vues/v_pied.html") ;
?>