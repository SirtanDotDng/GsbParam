<form method="post" action="index.php?uc=seConnecter&action=checkConnexion">
    <fieldset>
        <legend style="text-align:center">IDENTIFIANTS DE CONNEXION</legend>
        <div>
            <label for="nom">NOM</label>
        </div>
        <div>
            <input style="width:100%;" class="casesinput" type="text" name="nom" id="nom" value="<?php  if(isset($_COOKIE['nom'])){ echo $_COOKIE['nom'];}?>" required/>
        </div>
        <br>
        <div>
            <label for="mdp">MOT DE PASSE</label>
        </div>
        <div>
            <input style="width:100%" class="casesinput" type="password" name="mdp" id="mdp" required/>
        </div>
    </fieldset>
    <div>
        <input type="submit" name="bouton" value=" CONNEXION ">
    </div>        
</form>