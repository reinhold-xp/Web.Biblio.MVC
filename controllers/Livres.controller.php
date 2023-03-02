<?php
require_once "models/LivreManager.class.php";
require_once "models/AuteurManager.class.php";
require_once "controllers/Security.class.php";
require_once "controllers/Toolbox.class.php";

class LivresController
{
    private $livreManager;
    private $auteurManager;

    public function __construct()
    {
        $this->livreManager = new LivreManager;
        $this->livreManager->chargementLivres();

        $this->auteurManager = new AuteurManager;
        $this->auteurManager->chargementAuteurs();
    }

    public function afficherAccueil()
    {
        $livres = $this->livreManager->getLivres();
        require "views/accueil.view.php";
    }

    public function afficherLivres()
    {
        $livres = $this->livreManager->getLivres();
        $auteurs = $this->auteurManager->getAuteurs();
        require "views/livres.view.php";

        // Vidage variable de session alert
        unset($_SESSION['alert']);
    }

    public function afficherLivre($id)
    {
        $livre = $this->livreManager->getLivreById($id);
        $auteurs = $this->auteurManager->getAuteurs();
        require "views/afficherLivre.view.php";
    }

    public function ajoutLivre()
    {
        $auteurs = $this->auteurManager->getAuteurs();
        require "views/ajoutLivre.view.php";
    }

    public function ajoutLivreValidation()
    {
        if (empty($_POST['id_auteur']))
            throw new Exception("Vous devez indiquer un auteur");

        $file = $_FILES['image'];
        $repertoire = "public/images/";

        // Upload image dans le dossier spécifié, par l'intermédiaire d'une
        // fonction static définie dans classe Image
        $nomImageAjoute =  Toolboox::ajouterImage($file, $repertoire);

        // Insertion, table livres
        // Fonction static définie dans classe Securite pour securiser saisie utilisateur (faille XSS)
        $this->livreManager->ajoutLivreBd(Securite::secureHTML($_POST['titre']), Securite::secureHTML($_POST['nbPages']), $nomImageAjoute, Securite::secureHTML($_POST['id_auteur']), Securite::secureHTML($_POST['resume']));

        // Déclaration variable de session (tableau associatif)
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Ajout réalisé avec succès"
        ];

        // Redirection ...
        header('Location: ' . URL . "livres");
    }

    public function suppressionLivre($id)
    {

        $nomImage = $this->livreManager->getLivreById($id)->getImage();

        // Fonction unlink pour suppression image dans le dossier spécifié
        unlink("public/images/" . $nomImage);

        // Suppression entrée table livres
        $this->livreManager->suppressionLivreBD($id);

        // Déclaration variable de session (tableau associatif)
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression réalisée avec succès"
        ];

        // Redirection ...
        header('Location: ' . URL . "livres");
    }

    public function modificationLivre($id)
    {
        $livre = $this->livreManager->getLivreById($id);
        $auteurs = $this->auteurManager->getAuteurs();
        require "views/modifierLivre.view.php";
    }


    public function modificationLivreValidation()
    {
        $imageActuelle = $this->livreManager->getLivreById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {

            // Fonction unlink pour suppression image dans le dossier spécifié
            unlink("public/images/" . $imageActuelle);
            $repertoire = "public/images/";

            // Upload image dans le dossier spécifié, par l'intermédiaire d'une
            // fonction static définie dans classe Image
            $nomImageToAdd = Toolboox::ajouterImage($file, $repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }

        // Modificaiton entrée table livres
        // Fonction static définie dans classe Securite pour securiser saisie utilisateur (faille XSS)
        $this->livreManager->modificationLivreBD($_POST['identifiant'], Securite::secureHTML($_POST['titre']), Securite::secureHTML($_POST['nbPages']), $nomImageToAdd, Securite::secureHTML($_POST['id_auteur']), Securite::secureHTML($_POST['resume']));

        // Déclaration variable de session (tableau associatif)
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Modification réalisée avec succès"
        ];

        // Redirection ...
        header('Location: ' . URL . "livres");
    }
}
