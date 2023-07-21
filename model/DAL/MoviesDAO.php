<?php

class MoviesDAO extends Dao {

    // Récupère tous les films de la base de données
    public function getAll() {
        $query = $this->BDD->prepare("SELECT * FROM films");
        $query->execute();
        $movies = array();

        while ($data = $query->fetch()) {
            $movies[] = new Movie($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
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

        return $add->execute($values);
    }

    // Ajoute un rôle
    public function addRole($data, $idMovie) {        
        $values = [
            'idActor' => $ActorsDAO->getA, // Vérifier l'existence de l'acteur dans la bdd, ajout le cas échéant
            'idMovie' => $idMovie,
            'character' => $data->getCharacter(),
            'name' => $data->getName(),
            'surname' => $data->getSurname()
        ];
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