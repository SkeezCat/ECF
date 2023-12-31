<?php

class RolesDAO extends Dao {

    // Récupère tous les films de la base de données
    public function getAll($search) {
        $query = $this->BDD->prepare("SELECT * FROM roles WHERE idFilm = :search");
        $query->bindValue(':search', $search);
        $query->execute();

        $actorsDAO = new ActorsDAO();
        $roles = array();

        while ($data = $query->fetch()) {
            $roles[] = new Role($data['personnage'], $actorsDAO->getOne($data['idActeur']), $data['idFilm'], $data['idRole'], $data['test']);
        }

        return $roles;
    }

    // Ajoute un rôle
    public function add($data) {  
        $actorsDAO = new ActorsDAO();
        $actorId = $actorsDAO->add($data->getActor());
        
        $values = [
            'actorId' => $actorId,
            'movieId' => $data->getMovieId(),
            'character' => $data->getCharacter()
        ];

        $query = 'INSERT INTO roles (idActeur, idFilm, personnage) VALUES (:actorId, :movieId, :character)';
        $add = $this->BDD->prepare($query);

        return $add->execute($values); /*? $this->BDD->getLastId() : false; // Si la requête est un succès, retourne l'id du film (voir singleton)*/
    }

    public function getOne($id) {
    
    }

    public function delete($id) {

    }
}
?>