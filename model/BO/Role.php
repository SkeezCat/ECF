<?php 
class Role {
    private $idActor, $idMovie, $character, $idRole, $test;

    public function __construct(int $idActor, int $idMovie, string $character, int $idRole, int $test) {
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