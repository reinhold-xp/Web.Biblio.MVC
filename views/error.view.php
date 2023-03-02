<?php
ob_start();
?>

<div class="container">

    <div class="row">
        <img src="<?= URL ?>public/images/warning.svg" width="70" height="70" class="mx-auto d-block mt-5" alt="warning.svg">
    </div>

    <div class="row">
        <p class="col text-center">
            <?= $msg ?>
        </p>
    </div>

    <div class="row">
        <a href="<?= URL ?>accueil" class="btn btn-secondary col-3 mx-auto mt-5">Fermer</a>
    </div>

</div>



<?php
$content = ob_get_clean();
$titre = "Erreur";
$description = "Page d'erreurs";

require "template.php";
?>