<?php
class Actor {
    private $actorId, $name, $surname;

    public function __construct(string $name, string $surname, int $actorId = null) {
        $this->setActorId($actorId);
        $this->setName($name);
        $this->setSurname($surname);
    }

    public function getActorId() {
        return $this->actorId;
    }
    
    public function setActorId($actorId) {
        $this->actorId = $actorId;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getSurname() {
        return $this->surname;
    }
    
    public function setSurname($surname) {
        $this->surname = $surname;
    }
}
?>