<?php

class ActorsDAO extends Dao {

    // Récupère tous les acteurs
    public function getAll()
    {
        $query = $this->BDD->prepare("SELECT * FROM acteurs");
        $query->execute();
        $actors = array();

        while ($data = $query->fetch()) {
            $actors[] = new Actor($data['name'], $data['surname']);
        }
        return $actors;
    }

    // Ajoute un acteur
    public function add($data)
    {
        $values = ['name' => $data->getName(), 'surname' => $data->getSurname()];
        $query = 'INSERT INTO acteurs (nom, prenom) VALUES (:name , :surname)';
        $insert = $this->BDD->prepare($query);
        if (!$insert->execute($values)) {
            return false;
        } else {
            return true;
        }
    }

    // Récupère un acteur par son id
    public function getOne($id)
    {
        $query = $this->BDD->prepare('SELECT * FROM acteurs WHERE idActeur = :id');
        $query->execute(array(':id' => $id));
        $data = $query->fetch();
        $actor = new Actor($data['idActeur'], $data['nom'], $data['prenom']);
        return $actor;
    }

    // Récupère un acteur par son nom et son prénom
    public function getByName($name, $surname) { 
        $query = $this->BDD->prepare('SELECT * FROM acteurs WHERE nom = :name AND prenom = :surname');
        $query->execute(array(':name' => $name, ':surname' => $surname));
        $data = $query->fetch();
        $actor = new Actor($data['idActeur'], $data['nom'], $data['prenom']);
        return $actor;
    }

    // Supprime un acteur
    public function delete($id)
    {
        $query = $this->BDD->prepare('DELETE FROM acteurs WHERE idActeur = :id');
        $query->execute(array(':id' => $id));
    }
}
?>