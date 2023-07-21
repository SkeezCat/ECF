<?php
class Actor {
    private $idActor, $name, $surname;

    public function __construct(string $name, string $surname, int $idActor = null) {
        $this->setIdActor($idActor);
        $this->setName($name);
        $this->setSurname($surname);
    }

    public function getIdActor() {
        return $this->idActor;
    }
    
    public function setIdActor(int $idActor) {
        $this->idActor = $idActor;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName(string $name) {
        $this->name = $name;
    }
    
    public function getSurname() {
        return $this->surname;
    }
    
    public function setSurname(string $surname) {
        $this->surname = $surname;
    }
}
?>