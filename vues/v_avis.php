<div class="listAvis">
    <?php foreach($lesAvis as $unAvis){ ?>
    <div class="unAvis">
        <h3><?php echo $unAvis['Nom']." ".$unAvis['Prenom']." | "; for($i = 0; $i < $unAvis['Note']; $i++){ echo '<i class="fa-solid fa-circle"></i>'; } ?></h3>
        <p><?php echo $unAvis['Avis']; ?></p>
    </div>
<?php } ?>
</div>