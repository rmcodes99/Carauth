<?php
require "util.php";
$user = null;
if(isset($_GET["user"])) {
    $user = $_GET["user"];
    $pass = $_GET["pass"];
    $userpass = db_get_userpass($user );
    if ($userpass !== $pass) {
        if ($userpass === null) {
            # si db_get_userpass donne null , c'est que l'utilisateur n'est pas dans la base
            echo "<p>Erreur: Mauvais utilisateur </p>";
            $user = null;
        } else {
            echo "<p>Erreur: Mauvais mot de passe </p>";
            $user = null;
        }
    }
}

if($user !== null) {
    echo "<p>Bienvenue $user! Voici un FLAG{TODO}</p>"; # mettre un vrai flag
} else {
    echo "<form method=get >";
    echo "nom: <input type=text name=user ><br >";
    echo "pass: <input type=password name=pass ><br >";
    echo "<input type=submit ></form >";
}
?>