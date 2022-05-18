<?php
session_start();
include("vues/v_entete.html") ;
require_once("modele/fonctions.inc.php");
require_once("modele/bd.produits.inc.php");
echo "<body>";
if(isLogged() && isAdmin()){
	include("vues/v_bandeauAdmin.php");
}
else{
	if(isLogged()){
		include("vues/v_bandeauLogged.php");
	}
	else{
		include("vues/v_bandeau.php");	
	}
}
?>
<?php
if(isset($_REQUEST['uc'])) {   
	$uc = $_REQUEST['uc'];
}
else {
	$uc = 'accueil';
}
echo "<main>";
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
echo "</main>";
include("vues/v_pied.html") ;
echo "</body>";
?>