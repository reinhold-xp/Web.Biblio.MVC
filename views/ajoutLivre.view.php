<?php
ob_start();
?>
<div class="container">
    <div class="col-6 mx-auto">

        <!-- Formulaire attribut enctype : soumission fichier -->
        <form method="POST" action="<?= URL ?>livres/CV" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Indiquer le titre" required>
            </div>

            <div class="row">
                <div class="form-group col-sm-8">
                    <label for="id_auteur">Auteur</label>
                    <select name="id_auteur" id="id_auteur" class="form-select" required>

                        <option>Nouveau</option>
                        <option selected>Sélectionner</option>
                        <option disabled>──────────</option>
                        
                        <?php foreach ($auteurs as $auteur) : ?>
                            <option value="<?= $auteur->getId() ?>"><?= $auteur->getPrenom() ?> <?= $auteur->getNom() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label for="nbPages">Pages</label>
                    <input type="number" class="form-control" id="nbPages" name="nbPages" placeholder="Indiquer le nombre de pages" required>
                </div>
            </div>
            <div class="form-group">
                <label for="resume" class="form-label">Resumé</label>
                <textarea class="form-control" id="resume" name="resume" rows="13" placeholder="Entrer un résumé" required></textarea>
            </div>
            <div class="form-group mb-5">
                <label for="image">Image : </label>

                <!-- Upload fichier -->
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-secondary col-6 mx-auto m-4">Valider</button>
            </div>

        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = "Ajouter un livre";
$description = "Création d'un livre";

require "template.php";
?>