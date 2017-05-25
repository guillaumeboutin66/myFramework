<h1>Enfin ça fonctionne users !</h1>
<div id="listeUti">
<?php
    $um = new UserModel();
    $usersTable = $um->getAllUser();
    $tableHtml = "<table>";
    foreach ($usersTable as $user){
        $tableHtml .= "<tr><td>".$user['nom']."</td><td>".$user['prenom']."</td><td>".$user['email']."</td><td><a href='/user/adress/param?id=".$user['id']."' class='button'>Voir ses adresses</a></td></tr>";
    }
    $tableHtml .= "</table>";
    echo $tableHtml;
    echo "</div>";
    echo '<div class="add"><a href="/adduser">Ajouter un utilisateur</a></div>';
    echo '<input id="save" type="button" class="add" value="Enregister image des utilisateurs"/>';
    echo '<button id="send" class="add">Envoyer par mail liste des utilisateurs</button>';
?>
<script language="javascript">
    $(document).ready(function() {
        console.log("0");
        $("#save").click(function (item) {
            console.log("test");
            html2canvas($("#listeUti"), {
                onrendered: function(canvas) {
                    // canvas is the final rendered <canvas> element
                    var myImage = canvas.toDataURL("image/jpg");
                    window.open(myImage);
                }
            });
        })
    })
</script>