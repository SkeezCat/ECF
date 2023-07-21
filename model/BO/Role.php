<?php 
class Role extends Actor {
    private $idActor, $idMovie, $character, $idRole, $test;

    public function __construct(string $character, string $name, string $surname, int $idActor = null, int $idMovie = null, int $idRole = null, int $test = null) {
        parent::__construct($name, $surname);
        $this->getIdActor($idActor);
        $this->getIdMovie($idMovie);
        $this->getCharacter($character);
        $this->getIdRole($idRole);
        $this->getTest($test);
    }

    public function getIdActor() {
        return $this->idActor;
    }

    public function setIdActor($idActor) {
        $this->idActor = $idActor;
    }

    public function getIdMovie() {
        return $this->idMovie;
    }

    public function setIdMovie($idMovie) {
        $this->idMovie = $idMovie;
    }

    public function getCharacter() {
        return $this->character;
    }

    public function setCharacter($character) {
        $this->character = $character;
    }

    public function getIdRole() {
        return $this->idRole;
    }

    public function setIdRole($idRole) {
        $this->idRole = $idRole;
    }

    public function getTest() {
        return $this->test;
    }

    public function setTest($test) {
        $this->test = $test;
    }
}
?>