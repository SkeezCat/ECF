//elseif ($query = $this->BDD->prepare('SELECT * FROM Users WHERE username= :username')){
            $query->execute(array(':username' => $user->getUsername()));
            echo "Ce pseudo est déjà utilisé.";