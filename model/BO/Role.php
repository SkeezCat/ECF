<?php 
class Role extends Actor {
    private $movieId, $character, $roleId, $test;

    public function __construct(string $name, string $surname, int $actorId = null, string $character, int $movieId = null, int $roleId = null, int $test = null) {
        parent::__construct($name, $surname, $actorId);
        $this->getCharacter($character);
        $this->getMovieId($movieId);
        $this->getroleId($roleId);
        $this->getTest($test);
    }

    public function getMovieId() {
        return $this->movieId;
    }

    public function setMovieId($movieId) {
        $this->movieId = $movieId;
    }

    public function getCharacter() {
        return $this->character;
    }

    public function setCharacter($character) {
        $this->character = $character;
    }

    public function getRoleId() {
        return $this->roleId;
    }

    public function setRoleId($roleId) {
        $this->roleId = $roleId;
    }

    public function getTest() {
        return $this->test;
    }

    public function setTest($test) {
        $this->test = $test;
    }
}
?>