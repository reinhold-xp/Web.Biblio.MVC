<?php

/*********************
 * R O U T E U R
 * du site
 ********************/

// Initialisation session
session_start();

// En complément des règles de réécriture d'URL définies dans le 
// fichier htaccess (fichier de configuration Apache), 
// définition de la constante URL, basée sur la superglobale $_SERVER 
// avec une condition ternaire pour identifier le protocole afin
// d'accéder aux ressources à partir de la racine du site(chemin absolu)
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/Livres.controller.php";
require_once "controllers/Auteurs.controller.php";
require_once "controllers/Backend.controller.php";
require_once "controllers/Security.class.php";


// On instancie les contrôleurs 
$livreController = new LivresController;
$auteurController = new AuteursController;
$backendController = new BackendController();

// Routage ...
try {
    if (empty($_GET['page'])) {
        $livreController->afficherAccueil();
    } else {

        // Prévention faille XSS
        $page = Securite::secureHTML($_GET['page']);

        // On splite la variable $_GET avec explode() en la sécurisant grâce à filter_var() avec un filtre spécifique : 
        // FILTER_SANITIZE_URL qui supprime tous les caractères sauf les lettres, chiffres et $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=.
        // pour permettre différentes routes dans les cases et véhiculer vers le bon canal : CRUD
        $url = explode("/", filter_var($page), FILTER_SANITIZE_URL);

        switch ($url[0]) {

            case "accueil":
                $livreController->afficherAccueil();
                break;

            case "livres":

                // Liste par défaut
                if (empty($url[1])) {
                    $livreController->afficherLivres();
                }

                // Ajouter
                else if ($url[1] === "C") {
                    $livreController->ajoutLivre();
                }
                // Afficher 
                else if ($url[1] === "R") {
                    $livreController->afficherLivre($url[2]);
                }

                // Modifier
                else if ($url[1] === "U") {
                    $livreController->modificationLivre($url[2]);
                }

                // Supprimer
                else if ($url[1] === "D") {
                    $livreController->suppressionLivre($url[2]);
                }

                // Validation ajout
                else if ($url[1] === "CV") {
                    $livreController->ajoutLivreValidation();
                }

                // Validation modif
                else if ($url[1] === "UV") {
                    $livreController->modificationLivreValidation();
                }
                break;

            case "login":
                $backendController->getPageLogin();
                break;

            case "auteurs":

                if (empty($url[1])) {
                    $auteurController->afficherAuteurs();
                }

                // Ajouter
                else if ($url[1] === "C") {
                    $auteurController->ajoutAuteur();
                }

                // Modifier
                else if ($url[1] === "U") {
                    $auteurController->modificationAuteur($url[2]);
                }

                // Supprimer
                else if ($url[1] === "D") {
                    $auteurController->suppressionAuteur($url[2]);
                }

                // Validation ajout
                else if ($url[1] === "CV") {
                    $auteurController->ajoutAuteurValidation();
                }

                // Validation modif
                else if ($url[1] === "UV") {
                    $auteurController->modificationAuteurValidation();
                }
                break;

            case "error403":

                // Levée d'exception 403
                throw new  Exception("403 accès refusé");
                break;

            case "error404":
            default:

                // Levée d'exception 404
                throw new  Exception("404 page non trouvée");
        }
    }
}

// Récupération exceptions page d'erreur 
catch (Exception $e) {
    $msg = $e->getMessage();
    require "views/error.view.php";
}
