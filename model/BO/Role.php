<?php 
class Role {
    private $character, $movieId, $actorId, $roleId, $test;

    public function __construct(string $character, int $movieId, int $actorId, int $roleId = null, int $test = null) {
        $this->setCharacter($character);
        $this->setMovieId($movieId);
        $this->setActorId($actorId);
        $this->setroleId($roleId);
        $this->setTest($test);
    }

    public function getActorId() {
        return $this->actorId;
    }

    public function setActorId($actorId) {
        $this->actorId = $actorId;
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
        return sprintf($format, $this->getActorId(), $this->getMovieId(), $this->getCharacter());    
    }
}
?>