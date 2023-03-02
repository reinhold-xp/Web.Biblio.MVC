<?php
require_once "Connexion.class.php";

class AdminManager extends Connexion
{

    function getPasswordUser($login)
    {
        $bdd = $this->getBdd();
        $req = '
        SELECT * 
        FROM administrateur 
        WHERE login = :login';
        $stmt = $bdd->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $admin;
    }

    function isConnexionValid($login, $password)
    {
        $admin = $this->getPasswordUser($login);

        // La fonction password_verify vérifie si 
        // un mot de passe correspond à un Hashage
        return password_verify($password, $admin['password']);
    }
}
