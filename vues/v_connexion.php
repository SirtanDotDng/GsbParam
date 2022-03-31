<form method="post" action="index.php?uc=seConnecter&action=checkConnexion">
    <fieldset>
        <legend style="text-align:center">IDENTIFIANTS DE CONNEXION</legend>
        <div>
            <label for="mail">MAIL</label>
        </div>
        <div>
            <input style="width:100%;" class="casesinput" type="mail" name="mail" id="mail" value="<?php  if(isset($_COOKIE['mail'])){ echo $_COOKIE['mail'];}?>" required/>
        </div>
        <br>
        <div>
            <label for="password">MOT DE PASSE</label>
        </div>
        <div>
            <input style="width:100%" class="casesinput" type="password" name="password" id="password" required/>
        </div>
    </fieldset>
    <div>
        <input type="submit" name="bouton" value=" CONNEXION ">
    </div>        
</form>