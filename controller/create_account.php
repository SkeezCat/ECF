<?php 
$usersDAO = new UsersDAO();
$message = "";
$user;


// Affichage du template Create_Account
if (isset($_POST["username"]) && isset($_POST["password"])){
            if(empty($_POST["username"]))
            $message = "Le champs Username est vide";
        
    } elseif (!preg_match("#^[a-zA-Z0-9]+$#", $_POST["username"])) {
            $message = "Le Username doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";

    } elseif(empty($_POST["email"])){
        $message = "Le champs Email est vide.";

    } elseif (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/i', $_POST["email"])) {
        $message = "L'E-mail n'est pas au bon format.";

    } elseif(strlen($_POST["username"]>25)){
        $message = "Le Username est trop long, il dépasse les 25 caractères.";

        } elseif(empty($_POST["password"])){
            $message = "Le champs Password est vide.";
        
    } elseif(($_POST["password"])!==($_POST["password2"])){
        $message = "Les deux Passwords doivent être identiques.";
    
} else {
    $message = "Votre compte a bien été créé.";
    $user = $usersDAO ->add(new User($_POST["email"],$_POST["username"],$_POST["password"]));
}


echo $twig->render('create_account.html.twig', [
    'message' => $message
]);

?>