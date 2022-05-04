<h1> Compte | <?php echo $nom." ".$prenom; ?></h1>
<div class="compte">
    <div> Mail |        <?php echo $mail; ?></div>
    <div> Téléphone |   <?php echo $telephone; ?></div>
    <div> Adresse |     <?php echo $adresse; ?></div>
    <div> Ville |       <?php echo $ville; ?></div>
    <div> Code Postal | <?php echo $cp; ?></div>
</div>
<div class="hline"></div>
<a class="disconnect" href="index.php?uc=seConnecter&action=deconnexion">Déconnexion</a>