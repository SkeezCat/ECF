<?php 
// Initialisation des variables
$usersDao = new UsersDAO();
$user = "";

// Vérification des identifiants
if (isset($_POST['email'])) {
    $user = $usersDao->verifOne(new User($_POST['email'], $_POST['username'], $_POST['password']));
    
    if ($user != false) {
        $_SESSION['user'] = $user->getEmail();
    }
}

// Affichage du template Login
echo $twig->render('login.html.twig');
?>