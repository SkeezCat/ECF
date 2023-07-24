<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="get">
        <h1>Créer un compte</h1>
        <div>
            <label for="username">Username : </label>
            <input type="text" id="username" name="username"></input>
        </div>
        <div>
            <label for="email">E-mail : </label>
            <input type="email" id="email" name="email"></input>
        </div>
        <div>
            <label for="password">Password : </label> 
            <input type="password" id="password" name="password"></input>
        </div>
        <div>
            <label for="password2">Password (confirm) : </label>
            <input type="password" id="password2" name="password2"></input>
        </div>
        <button type="button" id="submit">Create Account</button>
    </form>
        <?php
        echo "<pre>";
        var_dump($_GET["username"]);
        var_dump($_GET["email"]);
        var_dump($_GET["password"]);
        var_dump($_GET["password2"]);
        echo "</pre>";
        ?>
        <?php
       // http://localhost/ECF/ECF/view/web/createAccount.php?username=skeezpanda&email=benedettolucie%40gmail.com&password=1234&password2=1234
        if (isset($_GET["username"]) && isset($_GET["password"])){
            if(empty($_GET["username"]))
            echo "Le champs Username est vide";
        } elseif (!preg_match("#^[a-zA-Z0-9+$#", $_GET["username"])) {
            echo "Le Username doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
    } elseif(strlen($_GET["username"]>25)){
        echo "Le Username est trop long, il dépasse les 25 caractères.";
        }
        ?>
   
</body>
</html>