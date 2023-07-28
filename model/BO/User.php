<?php
class User {
    private $email, $username, $password, $idUser;

    public function __construct(string $email, string $password, string $username = null, int $idUser = null) {
        $this->setEmail($email);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setIdUser($idUser);
    }

    public function getEmail() {
        return $this ->email;
    }

    public function setEmail($email){
        $this->email = $email;
    } 
    public function getUsername() {
        return $this ->username;
    }

    public function setUsername($username){
        $this->username = $username;
    } 

    public function getPassword() {
        return $this ->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getIdUser() {
        return $this ->idUser;
    }

    public function setIdUser($idUser){
        $this->idUser = $idUser;
    }
}
?>