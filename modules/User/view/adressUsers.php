<h1>Enfin ça fonctionne ADRESSE!</h1>
<?php
    $idUtilisateur = $_GET['id'];
    $modelAdress = new AddressModel();

    // Load adresses
    $adresseTable = $modelAdress->getAdresseByUser($idUtilisateur);

    $modelUser = new UserModel();

    $tableHtml = "<table>";
    foreach ($adresseTable as $adresse){
        $tableHtml .= "<tr><td>".$adresse['addressId']."</td><td>".$adresse['address']."</td><td>".$adresse['district']."</td></tr>";
    }
    $tableHtml .= "</table>";
    echo $tableHtml;

?>