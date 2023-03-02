<?php
ob_start();
?>

<div class="container">

    <div class="row">
        <article class="col-lg-10 mx-auto">
            <!--
            <img src="<?= URL ?>public/images/<?= $livre->getImage(); ?>" class="d-none d-md-block img-fluid float-md-end m-3" alt="<?= URL ?>public/images/<?= $livre->getImage(); ?>">
            --> 
            <p class="col m-3" id="resume"><?= $livre->getResume() ?></p>
        </article>
    </div>

    <div class="row">
        <a href="<?= URL ?>accueil" class="btn btn-secondary col-3 mx-auto m-4">Fermer</a>
    </div>

</div>

<?php
$content = ob_get_clean();
$titre = $livre->getTitre();
$description = "Page de résumé";

require "template.php";
?>