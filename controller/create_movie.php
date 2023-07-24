<?php
$moviesDAO = new MoviesDAO();
$actorsDAO = new ActorsDAO();

$movie;
$roles = Array('','','');

$done = false;

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
        $roles[$i] = new Role($_POST['name' . ($i + 1)], $_POST['surname' . ($i + 1)], $actorId, $_POST['character'. ($i + 1)], $movieId);
        $roles[$i]->setCharacter($_POST['character' . ($i + 1)]);
        $roles[$i]->setMovieId($movieId);
        $roles[$i]->setActorId($actorId);

        // TODO : Comprendre pourquoi certains paramètres retournent null dans la classe Role (et éviter les 3 lignes redondantes ci-dessus)

        // Ajoute le rôle dans la base de données
        $moviesDAO->addRole($roles[$i]);
    }

    $done = true;
}

// Affichage du template Create_Movie
echo $twig->render('create_movie.html.twig');
?>