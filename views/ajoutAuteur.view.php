<?php
ob_start();
?>
<div class="container">
    <div class="col-6 mx-auto">

        <!-- Formulaire attribut enctype : soumission fichier -->
        <form method="POST" action="<?= URL ?>auteurs/CV" enctype="multipart/form-data">
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>

            <div class="form-group mb-5">
                <label for="ddn">Date de naissance</label>
                <input type="date" class="form-control" id="ddn" name="ddn" required>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-secondary col-6 mx-auto m-4">Valider</button>
            </div>

        </form>
    </div>
</div>


<?php
$content = ob_get_clean();
$titre = "Ajouter un auteur";
$description = "Création d'un auteur";

require "template.php";
?>