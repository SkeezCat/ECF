<?php
class User {
    private $email, $username, $password;

    function __construct(string $email, string $username, string $password) {
        $this->setEmail($email);
        $this->setUsername($username);
        $this->setPassword($password);
    }

}
?>