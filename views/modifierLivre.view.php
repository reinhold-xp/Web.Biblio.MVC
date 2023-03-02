<?php
ob_start();
?>
<div class="container">
    <div class="col-6 mx-auto">
        <form method="POST" action="<?= URL ?>livres/UV" enctype="multipart/form-data">

            <!-- Bufferisation id livre -->
            <input type="hidden" name="identifiant" value="<?= $livre->getId(); ?>">

            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="<?= $livre->getTitre() ?>">
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="id_auteur">Auteur</label>
                    <select name="id_auteur" id="id_auteur" class="form-select">
                        <?php for ($i = 0; $i < count($auteurs); $i++) :
                            if ($livre->getAuteurId() === $auteurs[$i]->getId()) { ?>
                                <option selected value="<?= $livre->getAuteurId() ?>"><?= $auteurs[$i]->getPrenom() . " " . $auteurs[$i]->getNom() ?></option>
                            <?php } ?>
                        <?php endfor ?>
                        <?php foreach ($auteurs as $auteur) : ?>
                            <option value="<?= $auteur->getId() ?>"><?= $auteur->getPrenom() ?> <?= $auteur->getNom() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="nbPages">Pages</label>
                    <input type="number" class="form-control" id="nbPages" name="nbPages" value="<?= $livre->getNbPages() ?>">
                </div>
            </div>
            <div class="row mt-2">
                <div class="form-group col">
                    <label for="resume" class="form-label">Resumé</label>
                    <textarea class="form-control" id="resume" name="resume" rows="13"><?= $livre->getResume() ?></textarea>
                </div>     
            </div>

            <div class="row mt-2">
                <div class="form-group">
                     <div class="form-group">
                        <label for="image">Changer la couverture</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                </div>
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
$description = "Modification d'un livre";

require "template.php";
?>