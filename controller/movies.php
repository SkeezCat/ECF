<?php

// Récupération des films de la base de données
$moviesDAO = new MoviesDAO();
$movies = $moviesDAO->getAll();

// var_dump($movies->get)

// Affichage du template Movies
echo $twig->render('movies.html.twig', [
    'movies' => $movies
]);
?>