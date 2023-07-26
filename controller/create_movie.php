<?php
$moviesDAO = new MoviesDAO();

// Crée le film et les rôles
if (isset($_POST['title'])) {
    $roles = Array('','','');

    for ($i=0; $i < count($roles); $i++) {
        $roles[$i] = new Role($_POST['character' . $i + 1], new Actor($_POST['name'. $i + 1], $_POST['surname' . $i + 1]));
    }

    $moviesDAO->add(new Movie($_POST['title'], $_POST['director'], $_POST['poster'], $_POST['year'], $roles));
}

// Affichage du template Create_Movie
echo $twig->render('create_movie.html.twig');
?>