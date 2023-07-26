<?php

class MoviesDAO extends Dao {

    // Récupère tous les films de la base de données
    public function getAll($search) {
        $query = $this->BDD->prepare("SELECT * FROM films WHERE titre LIKE '%$search%'");
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
        $add->execute($values);
        $movieId = $this->BDD->getLastId();

        foreach ($data->getRoles() as $key => $value) {
            $value->setMovieId($movieId); // Récupère l'ID du film créé lors de cette requête
            $rolesDAO = new RolesDAO();

            var_dump($value);
            $rolesDAO->add($value);

            
        }

        //return $add->execute($values); //? $this->BDD->getLastId() : false; // Si la requête est un succès, retourne l'id du film (voir singleton)
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