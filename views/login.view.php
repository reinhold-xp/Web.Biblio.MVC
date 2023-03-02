<?php ob_start();  ?>

<div class="container">

    <div class='col-6 mx-auto'>
        <?php if ($alert !== "") {
            $txt = '<div class="alert alert-danger m-2 col-sm d-block mx-auto" role="alert">';
            $txt .= $alert;
            $txt .= '</div>';
            echo $txt;
        }
        ?>
        <form action="" method="POST">
            <div class="form-group row no-gutters align-items-center col-sm mx-auto">
                <label for="login" class="pr-5">Utilisateur</label>
                <input type="text" class="form-control" id="login" name="login" required />
            </div>
            <div class="form-group row no-gutters align-items-center col-sm mx-auto mb-5">
                <label for="password" class="pr-5">Password</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <div class="row">
                <input type="submit" value="Valider" class="btn btn-secondary col-6 mx-auto">
            </div>
        </form>
    </div>

</div>

<?php
$content = ob_get_clean();
$titre = "Login";
$description = "Page de login";

require "template.php";
?>