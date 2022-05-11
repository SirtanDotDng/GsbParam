<div class="form">
<form method="POST" action="index.php?uc=gererPanier&action=confirmerCommande">
   <fieldset>
     <legend>Commande</legend>
		<p>
			<label for="nom">Nom <a style="color:#ed9480">•</a></label>
			<input id="nom" type="text" name="nom" value="<?php echo $nom ?>" size="32" maxlength="32">
		</p>
		<p>
			<label for="rue">Rue <a style="color:#ed9480">•</a></label>
			 <input id="rue" type="text" name="rue" value="<?php echo $rue ?>" size="32" maxlength="64">
		</p>
		<p>
         <label for="cp">Code postal <a style="color:#ed9480">•</a> </label>
         <input id="cp" type="text" name="cp" value="<?php echo $cp ?>" size="5" maxlength="5">
      </p>
      <p>
         <label for="ville">Ville <a style="color:#ed9480">•</a> </label>
         <input id="ville" type="text" name="ville"  value="<?php echo $ville ?>" size="32" maxlength="32">
      </p>
      <p>
         <label for="mail">Mail <a style="color:#ed9480">•</a> </label>
         <input id="mail" type="text"  name="mail" value="<?php echo $mail ?>" size ="64" maxlength="64">
      </p> 
	  	<p>
         <input style="width:100%" class="button" type="submit" value="Valider" name="valider">
      </p>
	  </fieldset>
</form>
</div>





