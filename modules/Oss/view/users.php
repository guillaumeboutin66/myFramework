<h1>Enfin ça fonctionne users !</h1>
<?php
    $um = new UserModel();
    $usersTable = $um->getAllUser();
    $tableHtml = "<table>";
    foreach ($usersTable as $user){
        $tableHtml .= "<tr><td>".$user['nom']."</td><td>".$user['prenom']."</td><td>".$user['email']."</td><td><a href='/adress/user/".$user['id']."' class='button'>Voir ses adresses</a></td></tr>";
    }
    $tableHtml .= "</table>";
    echo $tableHtml;
?>