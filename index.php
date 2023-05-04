<?php

session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/Livres.controller.php";
require_once "controllers/Auteurs.controller.php";
require_once "controllers/Backend.controller.php";
require_once "controllers/Security.class.php";

$livreController = new LivresController;
$auteurController = new AuteursController;
$backendController = new BackendController();

try {
    if (empty($_GET['page'])) {
        $livreController->afficherAccueil();
    } else {

        $page = Securite::secureHTML($_GET['page']);
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

// Page d'erreur 
catch (Exception $e) {
    $msg = $e->getMessage();
    require "views/error.view.php";
}
