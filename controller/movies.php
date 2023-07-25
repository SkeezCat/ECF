<?php

// Récupération des films de la base de données
$moviesDAO = new MoviesDAO();
$movies = $moviesDAO->getAll();

// Récupère le résultat de la recherche depuis l'URL
$urlQuery = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

if ($urlQuery != null) {
    $search = explode('=', $urlQuery)[1];
    $result = Array();

    // Sélectionne les films à afficher en fonction de la recherche
    foreach ($movies as $key => $value) {
        if (str_contains(strtolower($value->getTitle()), strtolower($search))) {
            array_push($result, $value);
        }
    }

    $movies = $result;
}

// Affichage du template Movies
echo $twig->render('movies.html.twig', [
    'movies' => $movies,
]);

?>