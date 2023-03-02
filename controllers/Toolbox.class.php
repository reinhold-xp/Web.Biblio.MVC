<?php
require_once "controllers/Livres.controller.php";

class Toolboox
{

    public static function ajouterImage($file, $dir)
    {
        // On lève une exception ...
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");

        // Création dossier (mode 0777 : droits unix étendus)
        if (!file_exists($dir)) mkdir($dir, 0777);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        $target_file = $dir . $random . "_" . $file['name'];

        // Gestion autres exceptions & upload fichier
        if (!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnue");
        if (file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if ($file['size'] > 500000)
            throw new Exception("Le fichier est trop volumineux");

        // Upload
        if (!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image a échoué");
        else return ($random . "_" . $file['name']);
    }

    public static function getRandom($books, int $min)
    {
        // On retourne un index aléatoirement
        return (rand($min, count($books) - 1));
    }
}
