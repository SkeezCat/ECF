<?php 
class Role {
    private $character, $movieId, $actor, $roleId, $test;

    public function __construct(string $character, Actor $actor, int $movieId = null, int $roleId = null, int $test = null) {
        $this->setCharacter($character);
        $this->setMovieId($movieId);
        $this->setActor($actor);
        $this->setroleId($roleId);
        $this->setTest($test);
    }

    public function getActor() {
        return $this->actor;
    }

    public function setActor($actor) {
        $this->actor = $actor;
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

    public function __toString() {
        $format = '%s, %s : %s';
        return sprintf($format, $this->getActor()->getName(), $this->getMovieId(), $this->getCharacter());    
    }
}
?>