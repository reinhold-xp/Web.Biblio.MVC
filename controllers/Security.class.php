<?php

const COOKIE_PROTECT = "timer";

class Securite
{

    public static function secureHTML($string)
    {

        // On sécurise la saisie Utilisateur (faille XSS) en convertissant 
        // les caractères spéciaux en caractères HTML
        return htmlentities($string);
    }

    public static function genereCookiePassword()
    {

        // On génère une clé unique et 
        // difficile à reconstruire, composée de :
        // Id session +
        // Timestamp session +
        // Chiffre aléatoire
        $ticket = session_id() . microtime() . rand(0, 9999999);

        // Hashage du ticket avec l'agorithme de hachage SHA-512
        // utilisé en cryptographie pour calculer une empreinte numérique 
        // de 512 bits
        $ticket = hash("sha512", $ticket);

        // On génère un cookie contenant le ticket pendant 20 minutes
        setcookie(COOKIE_PROTECT, $ticket, time() + (60 * 20));

        // Dans la variable de session utilisateur pour la sécuriser
        // pour comparaison avec le cookie
        $_SESSION[COOKIE_PROTECT] = $ticket;
    }

    public static function verificationCookie()
    {

        // Vérification du ticket
        if ($_COOKIE[COOKIE_PROTECT] === $_SESSION[COOKIE_PROTECT]) {
            Securite::genereCookiePassword();
            return true;
        } else {
            session_destroy();
            throw new Exception("Autorisation refusée");
        }
    }

    public static function verifAccessSession()
    {
        return (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === "admin");
    }

    public static function verificationAccess()
    {
        return (self::verifAccessSession() && self::verificationCookie());
    }
}
