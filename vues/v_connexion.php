<div class="form">
<form method="post" action="index.php?uc=seConnecter&action=checkConnexion">
    <fieldset>
        <legend style="text-align:center">Identifiants de connexion</legend>
        <div>
            <label for="mail">Mail <a style="color:#ed9480">•</a></label>
        </div>
        <div>
            <input style="width:100%;" class="casesinput" placeholder="exemple@mail.com" type="mail" name="mail" id="mail" value="<?php  if(isset($_COOKIE['mail'])){ echo $_COOKIE['mail'];}?>" required/>
        </div>
        <div>
            <label for="password">Mot de passe <a style="color:#ed9480">•</a></label>
        </div>
        <div>
            <input style="width:100%" class="casesinput" type="password" name="password" id="password" required/>
        </div>
        <br>
        <div class="text-center"> 
            <button class="button" type="submit">Connexion</button>
        </div>             
    </fieldset>
</form>
<div style="text-align:center">
<p>Vous ne possédez pas de compte ?</p>
<a class="button" href="index.php?uc=seConnecter&action=formRegister">S'inscrire</a>
</div>
</div>