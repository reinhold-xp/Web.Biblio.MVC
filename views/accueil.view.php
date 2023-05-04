<!-- Buffer temporisation -->
<?php ob_start() ?>

<!-- Mise à jour variable de session -->
<?php $_SESSION['view'] = "accueil";  ?>

<!-- Contenu page -->
<div class="container">

    <div class="row">
        <div class="text-center">
            <h1 class="mb-0"><span id="whiteMarkUp">Biblio</span>thèque de poche</h1>
            <p id="slogan">accédez aux <span id="whiteMarkUp">idées</span> des meilleurs livres</p>
        </div>
    </div>

    <div class="row g-4 mb-3">

        <!-- 1 -->
        <div id="carouselExampleControls" class="carousel carousel-dark slide col-lg-3 ms-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div>
                    <h6></h6>
                </div>

                <?php for ($i = 0; $i < count($livres); $i++) : ?>
                    <div class="carousel-item <?php echo ($i === 0) ? "active" : "" ?> ">
                        <div class='col-md-auto text-center'>
                            <a href="<?= URL ?>livres/R/<?= $livres[$i]->getId(); ?>"><img src="public/images/<?= $livres[$i]->getImage() ?>" class="img-fluid d-block w-100" alt="<?= $livres[$i]->getImage() ?>"></a>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- 2 -->
        <div id="carouselExampleControls_2" class="carousel carousel-dark slide col-lg-3" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div>
                    <h6></h6>
                </div>
                <?php for ($i = 0; $i < count($livres); $i++) : ?>

                    <div class="carousel-item <?php echo ($i === 0) ? "active" : "" ?> ">
                        <div class='col-md-auto text-center'>

                            <?php $Count = Toolboox::getRandom($livres, 0);  ?>
                            <a href="<?= URL ?>livres/R/<?= $livres[$Count]->getId(); ?>"><img src="public/images/<?= $livres[$Count]->getImage() ?>" class="img-fluid d-block w-100" alt="<?= $livres[$Count]->getImage() ?>"></a>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls_2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls_2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- 3 -->
        <div id="carouselExampleControls_3" class="carousel carousel-dark slide col-lg-3 me-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div>
                    <h6></h6>
                </div>
                <?php for ($i = 0; $i < count($livres); $i++) : ?>

                    <div class="carousel-item <?php echo ($i === 0) ? "active" : "" ?> ">

                        <div class='col-md-auto text-center'>

                            <?php $Count = Toolboox::getRandom($livres, 0);  ?>
                            <a href="<?= URL ?>livres/R/<?= $livres[$Count]->getId(); ?>"><img src="public/images/<?= $livres[$Count]->getImage() ?>" class="img-fluid d-block w-100" alt="<?= $livres[$Count]->getImage() ?>"></a>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls_3" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls_3" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <div class="row g-4 mb-3">

        <!-- 4 -->
        <div id="carouselExampleControls_4" class="carousel carousel-dark slide d-none d-lg-block col-lg-3 ms-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div>
                    <h6></h6>
                </div>
                <?php for ($i = 0; $i < count($livres); $i++) : ?>

                    <div class="carousel-item <?php echo ($i === 0) ? "active" : "" ?> ">

                        <div class='col-md-auto text-center'>

                            <?php $Count = Toolboox::getRandom($livres, 0);  ?>
                            <a href="<?= URL ?>livres/R/<?= $livres[$Count]->getId(); ?>"><img src="public/images/<?= $livres[$Count]->getImage() ?>" class="img-fluid d-block w-100" alt="<?= $livres[$Count]->getImage() ?>"></a>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls_4" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls_4" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- 5 -->
        <div id="carouselExampleControls_5" class="carousel carousel-dark slide d-none d-lg-block col-lg-3" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div>
                    <h6></h6>
                </div>
                <?php for ($i = 0; $i < count($livres); $i++) : ?>

                    <div class="carousel-item <?php echo ($i === 0) ? "active" : "" ?> ">
                        <div class='col-md-auto text-center'>

                            <?php $Count = Toolboox::getRandom($livres, 0);  ?>
                            <a href="<?= URL ?>livres/R/<?= $livres[$Count]->getId(); ?>"><img src="public/images/<?= $livres[$Count]->getImage() ?>" class="img-fluid d-block w-100" alt="<?= $livres[$Count]->getImage() ?>"></a>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls_5" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls_5" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- 6 -->
        <div id="carouselExampleControls_6" class="carousel carousel-dark slide d-none d-lg-block col-lg-3 me-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div>
                    <h6></h6>
                </div>
                <?php for ($i = 0; $i < count($livres); $i++) : ?>

                    <div class="carousel-item <?php echo ($i === 0) ? "active" : "" ?> ">
                        <div class='col-md-auto text-center'>

                            <?php $Count = Toolboox::getRandom($livres, 0);  ?>
                            <a href="<?= URL ?>livres/R/<?= $livres[$Count]->getId(); ?>"><img src="public/images/<?= $livres[$Count]->getImage() ?>" class="img-fluid d-block w-100" alt="<?= $livres[$Count]->getImage() ?>"></a>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls_6" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls_6" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <div class="row g-4">

        <!-- 7 -->
        <div id="carouselExampleControls_7" class="carousel carousel-dark slide d-none d-lg-block col-lg-3 ms-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div>
                    <h6></h6>
                </div>
                <?php for ($i = 0; $i < count($livres); $i++) : ?>

                    <div class="carousel-item <?php echo ($i === 0) ? "active" : "" ?> ">

                        <div class='col-md-auto text-center'>

                            <?php $Count = Toolboox::getRandom($livres, 0);  ?>
                            <a href="<?= URL ?>livres/R/<?= $livres[$Count]->getId(); ?>"><img src="public/images/<?= $livres[$Count]->getImage() ?>" class="img-fluid d-block w-100" alt="<?= $livres[$Count]->getImage() ?>"></a>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls_7" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls_7" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- 8 -->
        <div id="carouselExampleControls_8" class="carousel carousel-dark slide d-none d-lg-block col-lg-3" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div>
                    <h6></h6>
                </div>
                <?php for ($i = 0; $i < count($livres); $i++) : ?>

                    <div class="carousel-item <?php echo ($i === 0) ? "active" : "" ?> ">
                        <div class='col-md-auto text-center'>

                            <?php $Count = Toolboox::getRandom($livres, 0);  ?>
                            <a href="<?= URL ?>livres/R/<?= $livres[$Count]->getId(); ?>"><img src="public/images/<?= $livres[$Count]->getImage() ?>" class="img-fluid d-block w-100" alt="<?= $livres[$Count]->getImage() ?>"></a>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls_8" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls_8" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- 9 -->
        <div id="carouselExampleControls_9" class="carousel carousel-dark slide d-none d-lg-block col-lg-3 me-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div>
                    <h6></h6>
                </div>
                <?php for ($i = 0; $i < count($livres); $i++) : ?>

                    <div class="carousel-item <?php echo ($i === 0) ? "active" : "" ?> ">
                        <div class='col-md-auto text-center'>

                            <?php $Count = Toolboox::getRandom($livres, 0);  ?>
                            <a href="<?= URL ?>livres/R/<?= $livres[$Count]->getId(); ?>"><img src="public/images/<?= $livres[$Count]->getImage() ?>" class="img-fluid d-block w-100" alt="<?= $livres[$Count]->getImage() ?>"></a>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls_9" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls_9" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

</div>

<!-- Chargement template avec contenu buffer -->
<?php
$content = ob_get_clean();
$titre = "";
$description = "Page d'accueil";

require "template.php";
?>