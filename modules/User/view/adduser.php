<form id="form" class="" method="post" action="/computeSaveUser">
    <div class="form_description">
        <h2>Ajout d'un utilisateur</h2>
    </div>
    <div>
        <label class="description" for="element_2">Nom</label>
        <input id="nom" name="nom" class="element text" maxlength="255" size="8" value="">
    </div>
    <div>
        <label>Prénom</label>
        <input id="prenom" name="prenom" class="element text" maxlength="255" size="14" value="">
    </div>
    <div>
        <label>Email</label>
        <input id="mail" name="mail" class="element text medium" type="text" maxlength="255" value="">
    </div>
    <div>
        <label>Mot de passe</label>
        <input id="mdp" name="mdp" class="element text medium" type="password" maxlength="255" value="">
    </div>
    <div>
        <label class="description" for="element_2">Adresse</label>
        <input id="address" name="address" class="element text" maxlength="255" size="8" value="">
    </div>
    <div>
        <label>Adresse 2</label>
        <input id="address2" name="address2" class="element text" maxlength="255" size="14" value="">
    </div>
    <div>
        <label>District</label>
        <input id="district" name="district" class="element text" maxlength="255" size="8" value="">
    </div>
    <div>
        <label>Ville</label>
        <select id="idVille">
            <option value="1">Paris</option>
            <option value="2">Perpignan</option>
            <option value="3">Canet</option>
        </select>
    </div>
    <div>
        <input id="saveForm" class="button_text" type="submit" name="submit" value="Ajouter">
    </div>
</form>