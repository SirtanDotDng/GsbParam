<div class="product">
    <h1><?php echo $leProduit['Nom'];?></h1>
    <section class="produit">
        <article>
            <div class="photoCard"><img src="<?php echo $leProduit['Image'] ?>" alt=image /></div>
        </article>
        <aside>
            <a class="note" href="index.php?uc=voirProduits&produit=<?php echo $id;?>&action=voirAvis">Avis | <?php for($i = 0; $i < $notei; $i++){ echo '<i class="fa-solid fa-circle"></i>'; } if($notei != $notef){ echo '<i class="fa-solid fa-circle-half-stroke"></i>'; }?></a>
            <p><?php echo $leProduit['Description'] ?></p>
            <?php if($leProduit['Quantite'] > 0){?>
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
            <?php } else {
                echo "<p style='color:#ed9480;'>Ce produit est actuellement en rupture de stock.</p>";
            } ?>
        </aside>
    </section>
<div class="hline"></div>
    <?php foreach($lesAvis as $unAvis){ ?>
    <div class="unAvis">
        <h3><?php echo $unAvis['Nom']." ".$unAvis['Prenom']." | "; for($i = 0; $i < $unAvis['Note']; $i++){ echo '<i class="fa-solid fa-circle"></i>'; } ?></h3>
        <p><?php echo $unAvis['Avis']; ?></p>
    </div>
<?php }?>
<?php if(isLogged()){?>
    <h1>Ajouter un avis</h1>
    <form method="post" action="index.php?uc=voirProduits&action=ajouterAvis&produit=<?php echo $id;?>">
        <input name="note" type="number" max="5" min="1">
        <textarea class="avis" name="avis" id="avis" rows="4"></textarea>
        <div class="text-center"> 
            <button class="button" type="submit">Publier</button>
        </div> 
    </form>
<?php } ?>
</div>