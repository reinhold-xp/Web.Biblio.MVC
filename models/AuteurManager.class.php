<?php
require_once "models/Auteur.class.php";
require_once "models/Livre.class.php";
require_once "models/Connexion.class.php";

class AuteurManager extends Connexion
{
    private $auteurs;

    public function ajoutAuteur($auteur)
    {
        $this->auteurs[] = $auteur;
    }

    public function getAuteurs()
    {
        return $this->auteurs;
    }

    public function chargementAuteurs()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM auteurs");
        $req->execute();
        $auteurs = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($auteurs as $auteur) {
            $a = new Auteur($auteur['id'], $auteur['prenom'], $auteur['nom'],  $auteur['ddn'],  $auteur['nationalite'], $auteur['image']);
            $this->ajoutAuteur($a);
        }
    }

    public function getAuteurById($id)
    {
        for ($i = 0; $i < count($this->auteurs); $i++) {
            if ($this->auteurs[$i]->getId() === $id) {
                return $this->auteurs[$i];
            }
        }

        // On lève une exception (gestion des alertes : index + livres.view)
        throw new Exception("Auteur introuvable");
    }

    public function ajoutAuteurBd($prenom, $nom, $ddn, $nationalite, $image)
    {
        $req = "
        INSERT INTO auteurs (prenom, nom, ddn, nationalite, image)
        VALUES (:prenom, :nom, :ddn, :nationalite, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":ddn", $ddn);
        $stmt->bindValue(":nationalite", $nationalite, PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        // Alimentation liste auteurs disponibles (application)
        if ($resultat > 0) {
            $auteur = new Auteur($this->getBdd()->lastInsertId(), $prenom, $nom, $ddn, $nationalite, $image);
            $this->ajoutAuteur($auteur);
        } else {
            throw new Exception("L'ajout de l'auteur a échoué");
        }
    }

    public function suppressionAuteurBD($id)
    {
        $req = "
        DELETE FROM auteurs 
        WHERE id = :idAuteur";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAuteur", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        // Mise à jour tableau auteurs disponibles (application)
        if ($resultat > 0) {
            $auteur = $this->getAuteurById($id);
            unset($auteur);
        }
    }

    public function modificationAuteurBD($id, $prenom, $nom, $ddn)
    {
        $req = "
        UPDATE auteurs
        SET prenom = :prenom, nom = :nom, ddn = :ddn
        WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":ddn", $ddn, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        // Mise à jour tableau livres disponibles (application)
        if ($resultat > 0) {
            $this->getAuteurById($id)->setPrenom($prenom);
            $this->getAuteurById($id)->setNom($nom);
            $this->getAuteurById($id)->setDdn($ddn);
 
        } else {
            throw new Exception("La modification a échoué");
        }
    }
}
