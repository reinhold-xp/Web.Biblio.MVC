<!-- Buffer temporisation -->
<?php ob_start() ?>

<!-- Mise à jour variable de session -->
<?php $_SESSION['view'] = "livres"; ?>

<!-- Gestion des alertes -->
<?php
if (!empty($_SESSION['alert'])) :
?>
    <!-- 
    <div class="alert alert-<?= $_SESSION['alert']['type'] ?> text-center" role="alert">
        <?= $_SESSION['alert']['msg'] ?>
    </div> 
    -->
<?php
endif;
?>

<div class="container">

    <div class="row mb-3">
        <!-- Si autorisé : ajouter un livre -->
        <?php if (Securite::verifAccessSession()) { ?>
            <a href="<?= URL ?>livres/C" class="btn btn-secondary col-3 mx-auto">Ajouter</a>
        <?php    } ?>

        <!-- Sinon : login -->
        <?php if (!Securite::verifAccessSession()) { ?>
            <a href="<?= URL ?>login" class="btn btn-warning col-3 mx-auto">Modifier</a>
        <?php } ?>
    </div>

    <div class="row">
        <div class="col-10 mx-auto">
            <!-- Tableau -->
            <table class="table table-dark table-striped table-sm mx-auto mt-3">

                <!-- Entête -->
                <tr class="">
                    <th>Id</th>

                    <?php if (!Securite::verifAccessSession()) { ?>
                        <th class="">Titre</th>
                    <?php } else { ?>
                        <th class="d-none d-md-table-cell">Titre</th>
                    <?php } ?>

                    <th class="d-none d-md-table-cell">Auteur</th>
                    <th class="d-none d-md-table-cell">Pages</th>

                    <!-- Actions admin sécurisées -->
                    <?php if (Securite::verifAccessSession()) { ?>
                        <th class="text-center" colspan=" 2">Actions</th>
                    <?php } ?>
                </tr>

                <!-- Condition if : début -->
                <?php if (!empty($livres)) { ?>

                    <!-- Boucle for : début -->
                    <?php for ($i = 0; $i < count($livres); $i++) : ?>

                        <?php
                        for ($j = 0; $j < count($auteurs); $j++) {
                            if ($livres[$i]->getAuteurId() === $auteurs[$j]->getId())
                                $auteur = $auteurs[$j]->getPrenom() . " " . $auteurs[$j]->getNom();
                        } ?>

                        <!-- Lignes -->
                        <tr>
                            <td class="align-middle"><?= $livres[$i]->getId(); ?></td>

                            <?php if (!Securite::verifAccessSession()) { ?>
                                <td class="align-middle"><?= $livres[$i]->getTitre(); ?></td>
                            <?php } else { ?>
                                <td class="align-middle d-none d-md-table-cell"><?= $livres[$i]->getTitre(); ?></td>
                            <?php } ?>

                            <td class="align-middle d-none d-md-table-cell"><?= $auteur ?></td>
                            <td class="align-middle d-none d-md-table-cell"><?= $livres[$i]->getNbPages() ?></td>

                            <!-- Si autorisé : modifier un livre -->
                            <?php if (Securite::verifAccessSession()) { ?>
                                <td class="align-middle text-right"><a href="<?= URL ?>livres/U/<?= $livres[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
                            <?php } ?>

                            <!-- Si autorisé : supprimer un livre (avec popUp de confirmation JS) -->
                            <?php if (Securite::verifAccessSession()) { ?>
                                <td class="align-middle  text-left">
                                    <form method="POST" action="<?= URL ?>livres/D/<?= $livres[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer ce livre ?');">
                                        <button class="btn btn-danger" type="submit">Supprimer</button>
                                    </form>
                                </td>
                            <?php } ?>
                        </tr>

                        <!-- Boucle for : fin -->
                    <?php endfor; ?>

                    <!-- Condition if : fin -->
                <?php } ?>
            </table>
        </div>
    </div>
</div>


<!-- Chargement template avec contenu buffer -->
<?php
$content = ob_get_clean();
$titre = "Livres";
$description = "Liste de livres";

require "template.php";
?>