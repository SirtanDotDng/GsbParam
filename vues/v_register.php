<div class="form">
<form method="post" action="index.php?uc=seConnecter&action=checkRegister">
    <fieldset>
        <legend style="text-align:center">Inscription</legend>
        <div class="form-group">
            <label for="nom">Nom <a style="color:#ed9480">•</a></label>
            <input pattern="([^\s][A-z0-9À-ž\s\d-_]+$)" type="text" class="form-control" id="nom" name="nom" required title="Uniquement des lettres">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom <a style="color:#ed9480">•</a></label>
            <input pattern="([^\s][A-z0-9À-ž\s\d-_]+$)" type="text" class="form-control" id="prenom" name="prenom" required title="Uniquement des lettres">
        </div>
        <div class="form-group">
            <label for="email">Mail <a style="color:#ed9480">•</a></label>
            <input type="email" class="form-control" placeholder="exemple@mail.com" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe <a style="color:#ed9480">•</a></label>
            <input pattern="(?=.*\W+)(?=.*[/\.!@#$%^&*_=+-]).{8,}" type="password" class="form-control" id="password"  name="password" title="Minimum 8 caractères dont chiffres, spéciaux, minuscules et majuscules." required >
        </div>
        <div class="form-group">
            <label for="password2">Confirmation du mot de passe <a style="color:#ed9480">•</a></label>
            <input type="password" class="form-control" id="password2" name="password2" required>
        </div>
        <div class="form-group">
            <label for="tel">Téléphone</label>
            <input pattern="[0-9]{10}" type="text" class="form-control" id="tel" name="tel">
            <small style="display:none" id="cpHelpBlock" class="form-text text-muted">Le numéro de téléphone doit contenir 10 chiffres.</small>
        </div>
        <div class="form-group">
            <label for="adresse">Rue</label>
            <input type="text" class="form-control" id="adresse" name="adresse" >
        </div>
        <div class="form-group">
            <label for="ville">Ville</label>
            <input pattern="([^\s][A-z0-9À-ž\s\d-_]+$)" type="text" class="form-control" id="ville" name="ville" title="Uniquement des lettres">
        </div>
        <div class="form-group">
            <label for="cp">Code postal</label>
            <input pattern="[0-9]{5}" type="text" class="form-control" id="cp" name="cp">
            <small style="display:none" id="cpHelpBlock" class="form-text text-muted">Le code postal doit contenir 5 chiffres.</small>
        </div>
        <br>
        <div class="text-center"> 
            <button class="button" type="submit">S'inscrire</button>
        </div>        
    </fieldset>
</form>
<div style="text-align:center">
<p>Vous possédez déjà un compte ?</p>
<a class="button" href="index.php?uc=seConnecter&action=formConnexion">Se connecter</a>
</div>
</div>