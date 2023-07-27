<?php

class UsersDAO extends Dao {
    // Récupère tous les utilisateurs
    public function getAll($search)
    {
        $query = $this->BDD->prepare('SELECT * FROM users');
        $query->execute();
        $users = array();

        while ($data = $query->fetch()) {
            $users[] = new User($data['email'], $data['username'], $data['password']);
        }

        return $users;
    }

     // Ajoute un utilisateur
     public function add($user)
    {
        $values = ['email' => $user->getEmail(), 'username' => $user->getUsername(), 'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT)];
        $requete = 'INSERT INTO users (email, userName, password) VALUES (:email , :username, :password)';
        $insert = $this->BDD->prepare($requete);

        return $insert->execute($values) ? $values['username'] : false;
        // if (!$insert->execute($valeurs)) {
        //     return false;
        // } else {
        //     return true;
        // }
    }

        // // Ajouter un utilisateur
        // public function add($data)
        // {
        //     $values = ['email' => $data->getEmail(), 'username' => $data->getUsername(), 'password' => password_hash($data->getPassword(), PASSWORD_DEFAULT)];
        //     $query = $this->BDD->prepare('INSERT INTO users (email, userName, password) VALUES (:email, :username, :password)');
        //     return $query->execute($values);
        // }
    

    // Vérifie un utilisateur
    public function verifOne($user)
    {
        $query = $this->BDD->prepare('SELECT * FROM users WHERE email = :email/* AND password = :password*/');
        $query->execute(array(':email' => $user->getEmail()/*, ':password' => $this->verifPassword($user->getPassword(), 'password')*/));
        $data = $query->fetch();

        if (!$data || !$this->verifPassword($user->getPassword(), $data['password'])) {
            return false;
        } else {
            $user = new User($data['email'], $data['username'], $data['password']);
            return $user;
        }
    }

    // Vérifie la correspondance du mot de passe saisi avec la base de données
    private function verifPassword($password, $hashedPassword) {
        if (password_verify($password, $hashedPassword)) {
            return $password;
        } else {
            return false;
        }
    }
    
    // Récupère un utilisateur
    public function getOne($email)
    {
        $query = $this->BDD->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(array(':email' => $email));
        $data = $query->fetch();
        $user = new User($data['email'], $data['username'], $data['password']);
        return $user;
    }

    //Modifier un utilisateur
    public function update($user) 
    {
        $valeurs = ['email' => $user->getEmail(), 'username' => $user->getUsername(), 'password' => $user->getPassword()];
        $query = 'UPDATE users SET email = :email, password = :password WHERE id = :id';
        $update = $this->BDD->prepare($query);
        if (!$update->execute($valeurs)) {
            return false;
        } else {
            return true;
        }
    }

    // Supprime un utilisateur
    public function delete($email)
    {
        $query = $this->BDD->prepare('DELETE FROM users WHERE users.email = :email_user');
        $query->execute(array(':email_user' => $email));
    }
}
?>