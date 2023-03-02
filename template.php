<?php
$loginMenu = "Se connecter";
if (isset($_SESSION['acces']) && !empty($_SESSION['acces']))
    $loginMenu = "Connecté : " . $_SESSION['acces'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Variables métadonnées -->
    <meta name="description" content="<?= $description ?>">
    <?php if (!empty($titre)) { ?>
        <title><?= $titre  ?></title>
    <?php } else { ?>
        <title>Biblio</title>
    <?php } ?>

    <!-- Bootstrap -->
    <link href="<?= URL ?>public/bootstrap/bootstrap.min.css" rel="stylesheet" />

    <!-- Feuille de style CSS -->
    <link rel="stylesheet" href="<?= URL ?>style.css">

    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= URL ?>public/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= URL ?>public/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= URL ?>public/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= URL ?>public/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= URL ?>public/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= URL ?>public/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= URL ?>public/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= URL ?>public/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= URL ?>public/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= URL ?>public/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= URL ?>public/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= URL ?>public/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= URL ?>public/icons/favicon-16x16.png">
    <link rel="manifest" href="<?= URL ?>public/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body>

    <div class="container">

        <!-- Menu -->
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark perso_shadow" id="header">
            <div class="container-fluid">

                <a class="navbar-brand" href="<?= URL ?>accueil">
                    <img src="<?= URL ?>public/images/book.svg" alt="book.svg" width="30" height="24" class="d-inline-block align-text-top">
                    Biblio
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Contenu
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= URL ?>livres">Livres</a></li>
                                <li><a class="dropdown-item" href="<?= URL ?>auteurs">Auteurs</a></li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>login"><?= $loginMenu ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contenu des pages -->
        <div class="container mt-2 perso_shadow" id="content">
            <h1 class="text-center"><?= $titre ?></h1>
            <?= $content ?>
        </div>

        <div class="container mt-2 perso_shadow" id="footer">
            <p class="text-center">© www.books.reinhold-info.com</p>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <!-- JS Bootstrap : bundle minifié incluant popper.js -->
    <script src='<?= URL ?>public/bootstrap/bootstrap.bundle.min.js'></script>

    <!-- JS Custom -->
    <script src="<?= URL ?>script.js"></script>
</body>

</html>