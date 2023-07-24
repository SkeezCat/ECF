<?php 

// Affichage du template Create_Account
if (isset($_POST["username"]) && isset($_POST["password"])){
            if(empty($_POST["username"]))
            $message = "Le champs Username est vide";
        } elseif (!preg_match("#^[a-zA-Z0-9]+$#", $_POST["username"])) {
            $message = "Le Username doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
    } elseif(strlen($_POST["username"]>25)){
        $message = "Le Username est trop long, il dépasse les 25 caractères.";
        } elseif(empty($_POST["password"])){
            $message = "Le champs Password est vide.";
        
    } else {
        
    }
echo $twig->render('create_account.html.twig', [

]);

?>
