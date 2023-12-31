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
    
    // Vérifie un utilisateur
    public function verifOne($user)
    {
        $query = $this->BDD->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(array(':email' => $user->getEmail()));
        $data = $query->fetch();
        
    if (!$data || !password_verify($user->getPassword(), $data['password'])) {
        return false;

        } else {
            $user = new User($data['email'], $data['password'], $data['username']);
            return $user;
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

// Ajouter un utilisateur
public function add($data)
{
    $query = $this->BDD->prepare('INSERT INTO users (email, password, username) VALUES (:email, :password, :username)');
    $values = [
        'email' => $data->getEmail(), 
        'username' => $data->getUsername(), 
        'password' => password_hash($data->getPassword(), PASSWORD_DEFAULT)
    ];

    return $query->execute($values);
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