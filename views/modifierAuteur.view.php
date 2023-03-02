<?php
ob_start();
?>
<div class="container">
    <div class="col-6 mx-auto">
        <form method="POST" action="<?= URL ?>auteurs/UV" enctype="multipart/form-data">

            <!-- Bufferisation id livre -->
            <input type="hidden" name="identifiant" value="<?= $auteur->getId(); ?>">

            <div class="form-group">
                <label for="prenom">Prenom </label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $auteur->getPrenom() ?>">
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $auteur->getNom() ?>">
            </div>

            <div class="form-group">
                <label for="date">Date de naissance</label>
                <input type="date" class="form-control" id="ddn" name="ddn" value="<?= $auteur->getDdn() ?>">
            </div>

            <div class="row">
                <button type="submit" class="btn btn-secondary col-6 mx-auto m-4">Valider</button>
            </div>
        </form>
    </div>

</div>

<?php
$content = ob_get_clean();
$titre = "Modification";
$description = "Modification d'un auteur";

require "template.php";
?>