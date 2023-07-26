<?php

class MoviesDAO extends Dao {

    // Récupère tous les films de la base de données
    public function getAll($search) {

        if(isset($_POST['search'])){
            $query = $this->BDD->prepare("SELECT * FROM films WHERE titre LIKE '%$search%'");
        } else {
            $query = $this->BDD->prepare("SELECT films.titre,films.idFilm, films.realisateur, films.affiche,films.annee, roles.personnage, acteurs.nom, acteurs.prenom FROM films INNER JOIN roles ON films.idFilm = roles.idFilm INNER JOIN acteurs ON roles.idActeur = acteurs.idActeur ");
        }
        $query->execute();
        $movies = array();

        while ($data = $query->fetch()) {
            $movies[] = new Movie($data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $data['idFilm']);
        }

        return $movies;
    }

    // Ajoute un film
    public function add($data) {
        $values = [
            'title' => $data->getTitle(),
            'director' => $data->getDirector(),
            'poster' => $data->getPoster(),
            'year' => $data->getYear()
        ];

        $query = 'INSERT INTO films (titre, realisateur, affiche, annee) VALUES (:title, :director, :poster, :year)';
        $add = $this->BDD->prepare($query);

        return $add->execute($values) ? $this->BDD->getLastId() : false; // Si la requête est un succès, retourne l'id du film (voir singleton)
    }

    public function getOne($id) {
    
    }

    public function getOneByTitle($title) {
        $query = $this->BDD->prepare('SELECT * FROM films WHERE name = :name AND titre = :title');
        $query->execute(array(':title' => $title));
        $data = $query->fetch();
        $movie = new Movie($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
        return $movie;
    }

    public function delete($id) {

    }
}
?>