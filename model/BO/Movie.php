<?php
class Movie {
    private $idMovie, $title, $director, $poster, $year;

    public function __construct(int $idMovie, string $title, string $director, string $poster, int $year) {
        $this->setIdMovie($idMovie);
        $this->setTitle($title);
        $this->setDirector($director);
        $this->setPoster($poster);
        $this->setYear($year);
    }

    public function getIdMovie() {
        return $this->idMovie;
    }

    public function setIdMovie($idMovie) {
        $this->idMovie = $idMovie;
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
}
?>