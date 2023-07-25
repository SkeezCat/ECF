<?php
$moviesDAO = new MoviesDAO();

// Récupération des films de la base de données
if (isset($_POST['search'])) {
    $movies = $moviesDAO->getAll(strtolower($_POST['search']));
}
else {
    $movies = $moviesDAO->getAll("");
}

// Affichage du template Movies
echo $twig->render('movies.html.twig', [
    'movies' => $movies,
]);
?>