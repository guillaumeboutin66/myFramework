<h2>Sauvegarde en cours</h2>
<?php
    //var_dump($_POST);

    // save User
    $um = new UserModel();
    $idUser = $um->saveUser($_POST["nom"], $_POST["prenom"], $_POST["mail"], $_POST["mdp"]);
    var_dump($idUser);

    // save Adresse
    $am = new AddressModel();
    $am->saveAddress($idUser, $_POST["address"], $_POST["address2"], $_POST["district"], 1);

    // Page POST pour faire une redirection GET pour une "sécurité" et éviter de mettre en favoris cette page
    $uri = $_SERVER['REQUEST_URI'];
    $explodeUri = explode("/", $uri);
    header('Location: '.$explodeUri[0].'/users'); exit();
?>