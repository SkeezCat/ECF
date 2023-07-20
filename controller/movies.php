<?php

// Récupération des films de la base de données
//$moviesDao = new MoviesDAO();
$movies = 'movies'/*$moviesDAO->getAll()*/;

// Affichage du template Movies
echo $twig->render('movies.html.twig', [
    'movies' => $movies
]);
?>