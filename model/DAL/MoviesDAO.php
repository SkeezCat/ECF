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
    public function add($data)
    {
        $values = [
            'idMovie' => $data->getIdMovie(), 
            'title' => $data->getTitle(),
            'director' => $data->getDirector(),
            'poster' => $data->getPoster(),
            'year' => $data->getYear()
        ];

        $query = 'INSERT INTO films (idFilm, titre, realisateur, affiche, annee) VALUES (:idMovie , :title, :director, :poster, :year)';
        $add = $this->BDD->prepare($query);

        return $add->execute($values);
    }
}
?>