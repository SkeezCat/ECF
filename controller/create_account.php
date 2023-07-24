<?php 

// Affichage du template Create_Account
 if (isset($_GET["username"]) && isset($_GET["password"])){
            if(empty($_GET["username"]))
            echo "Le champs Username est vide";
        } elseif (!preg_match("#^[a-zA-Z0-9+$#", $_GET["username"])) {
            echo "Le Username doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
    } elseif(strlen($_GET["username"]>25)){
        echo "Le Username est trop long, il dépasse les 25 caractères.";
        }
echo $twig->render('create_account.html.twig');
?>
