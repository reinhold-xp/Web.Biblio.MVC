<?php
require_once "models/Livre.class.php";
require_once "models/Connexion.class.php";

/********************************
 * Héritage classe abstraite ConnexionPDO
 * pour utiliser la BDD 
 *********************************/
class LivreManager extends Connexion
{

    // Tableau de livres
    private $livres;

    public function ajoutLivre($livre)
    {
        $this->livres[] = $livre;
    }

    public function getLivres()
    {
        return $this->livres;
    }

    // Liaison BDD + requête SQL (PDO)
    public function chargementLivres()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM livres");
        $req->execute();
        $mesLivres = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($mesLivres as $livre) {
            $l = new Livre($livre['id'], $livre['titre'], $livre['nbPages'], $livre['image'], $livre['id_auteur'], $livre['resume']);
            $this->ajoutLivre($l);
        }
    }

    public function getLivreById($id)
    {
        for ($i = 0; $i < count($this->livres); $i++) {
            if ($this->livres[$i]->getId() === $id) {
                return $this->livres[$i];
            }
        }

        // On lève une exception (voir gestion des alertes : index + livres.view)
        throw new Exception("Livre introuvable");
    }

    public function ajoutLivreBd($titre, $nbPages, $image, $id_auteur, $resume)
    {
        $req = "
        INSERT INTO livres (titre, nbPages, image, id_auteur, resume)
        VALUES (:titre, :nbPages, :image, :id_auteur, :resume)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $stmt->bindValue(":id_auteur", $id_auteur, PDO::PARAM_INT);
        $stmt->bindValue(":resume", $resume, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        // Alimentation liste livres disponibles (application)
        if ($resultat > 0) {
            $livre = new Livre($this->getBdd()->lastInsertId(), $titre, $nbPages, $image, $id_auteur, $resume);
            $this->ajoutLivre($livre);

        } else {
            throw new Exception("L'ajout du livre a échoué");
        }
    }

    public function suppressionLivreBD($id)
    {
        $req = "
        DELETE FROM livres 
        WHERE id = :idLivre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idLivre", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        // Mise à jour tableau livres disponibles (application)
        if ($resultat > 0) {
            $livre = $this->getLivreById($id);
            unset($livre);
        }
    }

    public function modificationLivreBD($id, $titre, $nbPages, $image, $id_auteur, $resume)
    {
        $req = "
        UPDATE livres 
        SET titre = :titre, nbPages = :nbPages, image = :image, id_auteur = :id_auteur, resume = :resume
        WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $stmt->bindValue(":id_auteur", $id_auteur, PDO::PARAM_INT);
        $stmt->bindValue(":resume", $resume, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        // Mise à jour tableau livres disponibles (application)
        if ($resultat > 0) {
            $this->getLivreById($id)->setTitre($titre);
            $this->getLivreById($id)->setNbPages($nbPages);
            $this->getLivreById($id)->setImage($image);
            $this->getLivreById($id)->setAuteurId($id_auteur);
            $this->getLivreById($id)->setResume($resume);
        } else {
            throw new Exception("La modification du livre a échoué");
        }
    }
}
