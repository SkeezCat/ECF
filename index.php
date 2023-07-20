<?php

// Initialisation de l'environnement
require './config/config.init.php';

// Assemblage de la page web avec les différents constructeurs
require _CTRL_ . 'header.php';

if (isset($_GET['action'])) {
    if (file_exists(_CTRL_ . $_GET['action'] . '.php')) {
        require _CTRL_ . $_GET['action'] . '.php';
    } else {
        require _CTRL_ . 'error.php';
    }
} else {
    require _CTRL_ . 'movies.php'; // TODO : Rediriger vers la page par défaut
}

require _CTRL_ . 'footer.php';
