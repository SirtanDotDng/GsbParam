<?php

foreach($lesCommandes as $uneCommande){
    
    $id = $uneCommande['ID'];
    $date = $uneCommande['Date'];
    $statut = $uneCommande['Statut'];
    $nom = $uneCommande['Nom'];
    $rue = $uneCommande['Rue'];
    $cp = $uneCommande['CodePostal'];
    $ville = $uneCommande['Ville'];
    $mail = $uneCommande['Mail'];
    
    ?><div class="card">
        <div><h1>Cmd n°<?php echo $id ?></h1>
        <div>Date | <?php echo $date ?></div>
        <div>Statut | <?php echo $statut ?></div>
        <div>Nom | <?php echo $nom ?></div>
        <div>Rue | <?php echo $rue ?></div>
        <div>Code Postal | <?php echo $cp ?></div>
        <div>Ville | <?php echo $ville ?></div>
        <div>Mail | <?php echo $mail ?></div>
    <div class="imgCard"><a class="tocart" href="http://localhost/Gsbparam/index.php?uc=administrer&action=gestionCommande&id=<?php echo $id ?>">Gérer</a></div>
    </div>

<?php
}