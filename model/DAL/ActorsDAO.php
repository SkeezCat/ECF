<?php

class ActorsDAO extends Dao {

    // Récupère tous les acteurs
    public function getAll($search)
    {
        $query = $this->BDD->prepare("SELECT * FROM acteurs WHERE idActeur = :search");
        $query->bindValue(':search', $search);
        $query->execute();

        $actors = array();

        while ($data = $query->fetch()) {
            $actors[] = new Actor($data['nom'], $data['prenom'], $data['idActeur']);
        }

        return $actors;
    }

    // Ajoute un acteur
    public function add($data)
    {
        if (!$this->getId($data->getName(), $data->getSurname())) {
            $values = ['name' => $data->getName(), 'surname' => $data->getSurname()];
            $query = 'INSERT INTO acteurs (nom, prenom) VALUES (:name , :surname)';
            $add = $this->BDD->prepare($query);
    
            return $add->execute($values) ? $this->BDD->getLastId() : false; // Si la requête est un succès, retourne l'id de l'acteur (voir singleton)
        } else {
            return $this->getId($data->getName(), $data->getSurname());
        }
    }

    // Récupère un acteur par son id
    public function getOne($id)
    {
        $query = $this->BDD->prepare('SELECT * FROM acteurs WHERE idActeur = :id');
        $query->execute(array(':id' => $id));
        $data = $query->fetch();
        $actor = new Actor($data['nom'], $data['prenom'], $data['idActeur']);
        return $actor;
    }

    // Récupère l'id d'un acteur par son nom et son prénom
    public function getId($name, $surname) { 
        $query = $this->BDD->prepare('SELECT * FROM acteurs WHERE nom = :name AND prenom = :surname');
        $query->execute(array(':name' => $name, ':surname' => $surname));
        $data = $query->fetch();

        //var_dump($query->fetch());

        return $data ? $data['idActeur'] : false;
    }

    // Supprime un acteur
    public function delete($id)
    {
        $query = $this->BDD->prepare('DELETE FROM acteurs WHERE idActeur = :id');
        $query->execute(array(':id' => $id));
    }
}
?>