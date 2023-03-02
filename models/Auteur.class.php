<?php
class Auteur
{
    private $id;
    private $prenom;
    private $nom;
    private $ddn;
    private $nationalite;
    private $image;

    public function __construct($id, $prenom, $nom, $ddn, $nationalite, $image)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->ddn = $ddn;
        $this->nationalite = $nationalite;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getDdn()
    {
        return $this->ddn;
    }

    public function setDdn($ddn)
    {
        $this->ddn = $ddn;
    }

    public function getNationalite()
    {
        return $this->nationalite;
    }

    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}
