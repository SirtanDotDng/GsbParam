<div class="product">
<h1><?php echo $leProduit['Nom'];?></h1>
<section class="produit">
    <article>
        <div class="photoCard"><img src="<?php echo $leProduit['Image'] ?>" alt=image /></div>
    </article>
    <aside>
        <p><?php echo $leProduit['Description'] ?></p>
        <p>Quantité restante : <?php echo $leProduit['Quantite'] ?></p>
        <form class="produit" method="post" action="index.php?uc=voirProduits&produit=<?php echo $id ?>&action=ajouterAuPanier">
            <fieldset>
                <div>
                    <label>Quantité</label>
                    <input type="number" min="1" max="<?php echo $leProduit['Quantite'] ?>">
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
</div>