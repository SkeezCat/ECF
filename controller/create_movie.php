<?php
$moviesDAO = new MoviesDAO();
$actorsDAO = new ActorsDAO();

$movie;
$roles = Array('','','');

if (isset($_POST['title'])) {

    // Récupère les données du formulaire et ajoute le film dans la base de données
    $movie = new Movie($_POST['title'], $_POST['director'], $_POST['poster'], $_POST['year']);
    $movieId = intval($moviesDAO->add($movie));

    // Ajoute les rôles et les acteurs dans la base de données
    for ($i=0; $i < count($roles); $i++) {

        // Récupère ou crée l'acteur et son identifiant depuis la base de données
        $actorId = intval($actorsDAO->getId($_POST['name'. ($i + 1)], $_POST['surname' . ($i + 1)]));

        if (!$actorId) {
            $actorId = intval($actorsDAO->add(new Actor($_POST['name'. ($i + 1)], $_POST['surname' . ($i + 1)])));
        }

        // Récupère les données du rôle du formulaire et ajoute le rôle dans la base de données
        $roles[$i] = new Role($_POST['character' . $i + 1], $movieId, $actorId);

        // Ajoute le rôle dans la base de données
        $moviesDAO->addRole($roles[$i]);
    }
}

// Affichage du template Create_Movie
echo $twig->render('create_movie.html.twig');
?>