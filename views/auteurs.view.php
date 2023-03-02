<!-- Buffer temporisation -->
<?php ob_start() ?>

<!-- Mise à jour variable de session -->
<?php $_SESSION['view'] = "auteurs"; ?>

<!-- Gestion des alertes -->
<?php
if (!empty($_SESSION['alert'])) :
?>
    <!--
    <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
        <?= $_SESSION['alert']['msg'] ?>
    </div>
    -->
<?php
endif;
?>

<div class="container">

    <div class="row mb-3">
        <!-- Si autorisé : ajouter un auteur -->
        <?php if (Securite::verifAccessSession()) { ?>
            <a href="auteurs/C" class="btn btn-secondary col-3 mx-auto">Ajouter</a>
        <?php    } ?>

        <!-- Sinon : login -->
        <?php if (!Securite::verifAccessSession()) {
            $_SESSION['view'] = "auteurs"; ?>
            <a href="login" class="btn btn-warning col-3 mx-auto">Modifier</a>
        <?php } ?>
    </div>

    <div class="row">

        <div class="col-10 mx-auto">

            <!-- Tableau -->
            <table class="table table-dark table-striped table-sm mx-auto mt-3" id="table-authors">

                <!-- Condition if : début -->
                <?php if (!empty($auteurs)) { ?>
                    <tr>
                        <th>Id</th>

                        <?php if (!Securite::verifAccessSession()) { ?>
                            <th class="">Prénom</th>
                            <th class="">Nom</th>
                        <?php } else { ?>
                            <th class="d-none d-md-table-cell">Prénom</th>
                            <th class="d-none d-md-table-cell">Nom</th>
                        <?php } ?>

                        <!-- On masque les champs sur les Smartphones -->
                        <th class="d-none d-md-table-cell">Naissance</th>

                        <!-- Actions admin sécurisées -->
                        <?php if (Securite::verifAccessSession()) { ?>

                            <!-- Attribut colspan pour fusionner des colonnes-->
                            <th class="text-center" colspan="2">Actions</th>
                        <?php } ?>

                    </tr>
                    <!-- Boucle for : début -->
                    <?php for ($i = 0; $i < count($auteurs); $i++) : ?>
                        <tr>
                            <td class="align-middle"><?= $auteurs[$i]->getId(); ?></td>

                            <?php if (!Securite::verifAccessSession()) { ?>
                                <td class=""><?= $auteurs[$i]->getPrenom(); ?></td>
                                <td class=""><?= $auteurs[$i]->getNom(); ?></td>
                            <?php } else { ?>
                                <td class="align-middle d-none d-md-table-cell"><?= $auteurs[$i]->getPrenom(); ?></td>
                                <td class="align-middle d-none d-md-table-cell"><?= $auteurs[$i]->getNom(); ?></td>
                            <?php } ?>

                            <td class="align-middle d-none d-md-table-cell"><?= date("d/m/Y", strtotime($auteurs[$i]->getDdn())); ?> </td>

                            <!-- Si autorisé : modifier un auteur -->
                            <?php if (Securite::verifAccessSession()) { ?>
                                <td class="align-middle p-2"><a href="<?= URL ?>auteurs/U/<?= $auteurs[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
                            <?php } ?>

                            <!-- Si autorisé : supprimer un auteur (avec popUp de confirmation JS) -->
                            <?php if (Securite::verifAccessSession()) { ?>
                                <td class="align-middle">
                                    <form method="POST" action="<?= URL ?>auteurs/D/<?= $auteurs[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer cet auteur ?');">
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
$titre = "Auteurs";
$description = "Liste des auteurs";

require "template.php";
?>