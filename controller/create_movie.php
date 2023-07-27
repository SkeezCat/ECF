<?php
$moviesDAO = new MoviesDAO();
$message = "";
$movie;

// Crée le film et les rôles
try {
    if (isset($_POST['title'])) {
        $roles = Array('','','');
    
        for ($i=0; $i < count($roles); $i++) {
            $roles[$i] = new Role($_POST['character' . $i + 1], new Actor($_POST['name'. $i + 1], $_POST['surname' . $i + 1]));
        }
    
        $movie = $moviesDAO->add(new Movie($_POST['title'], $_POST['director'], $_POST['poster'], $_POST['year'], $roles));
    
        $message = $movie->getTitle() . " a bien été ajouté à la base de données";
    }
} catch (Exception $e) {
    $message = "Votre film n'a pas pu être ajouté à la base de données";
}

// Affichage du template Create_Movie
echo $twig->render('create_movie.html.twig', [
    'message' => $message
]);
?>