<?php
$moviesDAO = new MoviesDAO();

// Récupération des films de la base de données
try {
    if (isset($_POST['search'])) {
        $movies = $moviesDAO->getAll(strtolower($_POST['search']));
    }
    else {
        $movies = $moviesDAO->getAll("");
    }
} catch (PDOException $e) {
    echo "Erreur dans le mysql ". $e->getMessage();
}


// Affichage du template Movies
echo $twig->render('movies.html.twig', [
    'movies' => $movies,
]);
?>