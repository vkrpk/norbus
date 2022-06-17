<?php
if(isset($_SESSION['errors'])) {

    foreach ($_SESSION['errors'] as $errorsArray) {
        foreach ($errorsArray as $errors) {
            foreach ($errors as $error) {
                echo "<li>{$error}</li>";
            }
        }
    }

}
require VIEWS . 'includes/form/input.php';
?>
<h1>Se connecter</h1>

<form action="/login" method="POST" class="form-add-order">

    <div class="box-select">
        <?= insertInput('Adresse mail', 'mail', 'text') ?>
        <?= insertInput('Mot de passe', 'password', 'password') ?>
    </div>

    <button type="submit" class="button">S'inscrire</button>
</form>