<?php
class Livre
{
    private $id;
    private $titre;
    private $nbPages;
    private $image;
    private $id_auteur;
    private $resume;

    public function __construct($id, $titre, $nbPages, $image, $id_auteur, $resume)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->image = $image;
        $this->id_auteur = $id_auteur;
        $this->resume = $resume;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitre()
    {
        return $this->titre;
    }
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getNbPages()
    {
        return $this->nbPages;
    }
    public function setNbPages($nbPages)
    {
        $this->nbPages = $nbPages;
    }

    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getAuteurId()
    {
        return $this->id_auteur;
    }
    public function setAuteurId($id_auteur)
    {
        $this->id_auteur = $id_auteur;
    }

    public function getResume()
    {
        return $this->resume;
    }
    public function setResume($resume)
    {
        $this->resume = $resume;
    }


}
