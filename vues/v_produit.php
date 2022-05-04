<div class="product">
<h1><?php echo $leProduit['Nom'];?></h1>
<section class="produit">
    <article>
        <div class="photoCard"><img src="<?php echo $leProduit['Image'] ?>" alt=image /></div>
    </article>
    <aside>
        <p>Note | <?php for($i = 0; $i < floor(integer($note['note']['note'])) ; $i++){ echo '<i class="fa-solid fa-circle"></i>'; }?></p>
        <p><?php echo $leProduit['Description'] ?></p>
        <p>Quantité restante : <?php echo $leProduit['Quantite'] ?></p>
        <form class="produit" method="post" action="index.php?uc=voirProduits&produit=<?php echo $id ?>&action=ajouterAuPanier">
            <fieldset>
                <div>
                    <label>Quantité</label>
                    <input type="number" value="1" min="1" max="<?php echo $leProduit['Quantite'] ?>">
                </div>
                <div>
                    <label>Contenance</label>
                    <select>
                        <option>1</option>
                        <option>2</option>
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
<form method="post" action="index.php?uc=voirProduits&action=ajouterAvis">
    <textarea name="avis" id="avis" rows="6"></textarea>
</form>
</div>