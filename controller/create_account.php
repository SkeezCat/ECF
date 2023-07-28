<?php 
$message = "";
$user = null;


// Affichage du template Create_Account
if (isset($_POST["email"]) && isset($_POST["password"])){
    $usersDAO = new UsersDAO();
if (empty($_POST["username"])) {
            $message = "Le champs Username est vide";}
if (!preg_match('#^[a-zA-Z0-9]+$#', $_POST["username"])) {
            $message = "Le Username doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";} 
        
if (empty($_POST["email"])){
        $message = "Le champs Email est vide.";

} if (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/i', $_POST["email"])) {
        $message = "L'E-mail n'est pas au bon format.";

} if(empty($_POST["password"])){
            $message = "Le champs Password est vide.";
        
} if(($_POST["password"])!==($_POST["password2"])){
        $message = "Les deux Passwords doivent être identiques.";
    
} else {
    $message = "Votre compte a bien été créé.";
    $user = $usersDAO ->add(new User($_POST["email"], $_POST["password"], $_POST["username"]));
    header('Location: login');
}
}

echo $twig->render('create_account.html.twig', [
    'message' => $message,
    // 'user' => $user
]);
// var_dump($user)
?>