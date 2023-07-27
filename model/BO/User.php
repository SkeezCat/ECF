<?php
class User {
    private $email, $username, $password;

    public function __construct(string $email, string $username, string $password) {
        $this->setEmail($email);
        $this->setUsername($username);
        $this->setPassword($password);
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

}
?>