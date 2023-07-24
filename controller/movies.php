<?php

// Récupération des films de la base de données
$moviesDAO = new MoviesDAO();
$movies = $moviesDAO->getAll();

$search;

// Récupère le résultat de la recherche depuis l'URL
$queryResult = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

if ($queryResult != null) {
    $search = explode($queryResult)[1];
}

// Affichage du template Movies
echo $twig->render('movies.html.twig', [
    'movies' => $movies,
    'search' => $search
]);
?>