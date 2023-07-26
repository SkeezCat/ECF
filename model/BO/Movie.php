<?php
class Movie {
    private $movieId, $title, $director, $poster, $year;
    private $roles = array();

    public function __construct(string $title, string $director, string $poster, int $year, $roles = null, int $movieId = null) {
        $this->setMovieId($movieId);
        $this->setTitle($title);
        $this->setDirector($director);
        $this->setPoster($poster);
        $this->setYear($year);
        $this->setRoles($roles);
    }

    public function getMovieId() {
        return $this->movieId;
    }

    public function setMovieId($movieId) {
        $this->movieId = $movieId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDirector() {
        return $this->director;
    }  

    public function setDirector($director) {
        $this->director = $director;
    }

    public function getPoster() {
        return $this->poster;
    }

    public function setPoster($poster) {
        $this->poster = $poster;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function getRoles() {
        return $this->roles;
    }

    public function setRoles($roles) {
        $this->roles = $roles;
    }
}
?>