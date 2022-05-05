<div class="product">
<h1><?php echo $leProduit['Nom'];?></h1>
<section class="produit">
    <article>
        <div class="photoCard"><img src="<?php echo $leProduit['Image'] ?>" alt=image /></div>
    </article>
    <aside>
        <a class="note" href="index.php?uc=voirProduits&produit=<?php echo $id;?>&action=voirAvis">Avis | <?php for($i = 0; $i < $notei; $i++){ echo '<i class="fa-solid fa-circle"></i>'; } if($notei != $notef){ echo '<i class="fa-solid fa-circle-half-stroke"></i>'; }?></a>
        <p><?php echo $leProduit['Description'] ?></p>
        <p>Quantité restante : <?php echo $leProduit['Quantite'] ?></p>
        <form class="produit" method="post" action="index.php?uc=voirProduits&produit=<?php echo $id ?>&action=ajouterAuPanier">
            <fieldset>
                <div>
                    <label>Quantité</label>
                    <input name="quantite" type="number" value="1" min="1" max="<?php echo $leProduit['Quantite'] ?>">
                </div>
                <div>
                    <label>Contenance</label>
                    <select name="contenance">
                        <?php foreach($lesContenances as $uneContenance){
                            echo "<option value='".$uneContenance['ID']."'>".$uneContenance['Quantite']." ".$uneContenance['Unite']."</option>";
                        }                    
                        ?>
                    </select>
                </div>
                <br>
                <div class="text-center"> 
                    <button class="button" type="submit">Ajouter au panier</button>
                </div>       
            </fieldset>
        </form>
    </aside>
</section>
<div class="hline"></div>
Ajouter un avis
<form method="post" action="index.php?uc=voirProduits&action=ajouterAvis&produit=<?php echo $id;?>">
    <input name="note" type="number" max="5" min="1">
    <textarea class="avis" name="avis" id="avis" rows="4"></textarea>
    <div class="text-center"> 
        <button class="button" type="submit">Publier</button>
    </div> 
</form>
</div>