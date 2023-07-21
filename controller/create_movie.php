<?php
$moviesDAO = new MoviesDAO();
$actorsDAO = new ActorsDAO();

$movie;
$roles = Array('','','');


if (isset($_POST['title'])) {

    // Ajoute le film dans la base de données
    $movie = new Movie($_POST['title'], $_POST['director'], $_POST['poster'], $_POST['year']);
    $moviesDAO->add($movie);

    // Ajoute les rôles dans la base de données
    for ($i=0; $i < count($roles); $i++) { 
        $roles[$i] = new Role($_POST['character' . ($i + 1)], $_POST['name' . ($i + 1)], $_POST['surname' . ($i + 1)]);
        $movie->setRoles($roles[$i]);
        $moviesDAO->addRole($roles[$i], $moviesDAO->getOneByTitle($_POST['title'])->getID()); // TODO : Voir une autre manière de récupérer l'ID du film qu'on vient d'ajouter...

        // Ajoute les acteurs dans la base de données
        if ($actorsDAO->getByName($_POST['name'. ($i + 1)], $_POST['surname' . ($i + 1)]) == null) {
            $actorsDAO->add(new Actor($_POST['name'. ($i + 1)], $_POST['surname' . ($i + 1)]));
        }

        // TODO : Prévenir la duplication des acteurs
        // TODO : Associer les ID d'acteur et de film pour chaque rôle

    }
}

// Affichage du template Create_Movie
echo $twig->render('create_movie.html.twig');
?>