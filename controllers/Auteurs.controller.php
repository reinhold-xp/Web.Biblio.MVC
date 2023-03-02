<?php

require_once "models/AuteurManager.class.php";
require_once "controllers/Security.class.php";

class  AuteursController
{
    private $auteurManager;

    public function __construct()
    {
        $this->auteurManager = new AuteurManager;
        $this->auteurManager->chargementAuteurs();
    }

    public function afficherAuteurs()
    {
        $auteurs = $this->auteurManager->getAuteurs();
        require "views/auteurs.view.php";

        // Vidage variable de session alert
        unset($_SESSION['alert']);
    }

    public function ajoutAuteur()
    {
        require "views/ajoutAuteur.view.php";
    }

    public function ajoutAuteurValidation()
    {

        $nomImageDefaut =  "author.png";

        // Insertion, table auteurs
        // Fonction static définie dans classe Securite pour securiser saisie utilisateur (faille XSS)
        $this->auteurManager->ajoutAuteurBd(
            Securite::secureHTML($_POST['prenom']),
            Securite::secureHTML($_POST['nom']),
            Securite::secureHTML($_POST['ddn']),
            Securite::secureHTML($_POST['nationalite']),
            $nomImageDefaut
        );

        // Déclaration variable de session (tableau associatif)
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Ajout réalisé avec succès"
        ];

        // Redirection ...
        header('Location: ' . URL . "auteurs");
    }

    public function suppressionAuteur($id)
    {

        $nomImage = $this->auteurManager->getAuteurById($id)->getImage();

        // Fonction unlink pour suppression image dans le dossier spécifié
        unlink("public/images/" . $nomImage);

        // Suppression entrée table auteurs
        $this->auteurManager->suppressionAuteurBD($id);

        // Déclaration variable de session (tableau associatif)
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression réalisée avec succès"
        ];

        // Redirection ...
        header('Location: ' . URL . "auteurs");
    }

    public function modificationAuteur($id)
    {
        $auteur = $this->auteurManager->getAuteurById($id);
        require "views/modifierAuteur.view.php";
    }


    public function modificationAuteurValidation()
    {
        // Modificaiton entrée table livres
        // Fonction static définie dans classe Securite pour securiser saisie utilisateur (faille XSS)
        $this->auteurManager->modificationAuteurBD($_POST['identifiant'], Securite::secureHTML($_POST['prenom']), Securite::secureHTML($_POST['nom']), Securite::secureHTML($_POST['ddn']));

        // Déclaration variable de session (tableau associatif)
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Modification réalisée avec succès"
        ];

        // Redirection ...
        header('Location: ' . URL . "auteurs");
    }
}
