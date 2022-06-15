<?php
require VIEWS . 'includes/form/input.php';
$zeroToDixArray = [];
for ($i=0; $i <= 10 ; $i++) {
    $objet = new stdClass;
    $objet->id = $i;
    $objet->nom = $i;
    $zeroToDixArray[] = $objet;
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST !== []){
    // $_POST = filter_input_array(INPUT_POST, [
    //     'depart' =>
    // ])
    // dd($_POST);
}
?>

<h1>Réservez votre trajet en bus</h1>

<form action="/" method="POST">
    <div>
        <?= insertSelect('Départ', 'depart', $params['villes']) ?>
        <?= insertSelect('Arrivée', 'arrivee', $params['villes']) ?>
    </div>

    <div class="box-select">
        <?= insertInput('Aller', 'date_fin', 'date') ?>
        <?= insertInput('Retour', 'date_retour', 'date') ?>
    </div>

    <div>
        <?= insertSelect('Adultes', 'adultes', $zeroToDixArray) ?>
        <?= insertSelect('Enfants', 'enfants', $zeroToDixArray) ?>
    </div>

    <div class="form-radios">
        <p class="label-btn-radios">Aller retour</p>
        <input type="radio" id="oui"
        name="aller_retour" value="oui">
        <label for="oui">Oui</label>

        <input type="radio" id="non"
        name="aller_retour" value="non">
        <label for="non">Non</label>
    </div>

    <button type="submit" class="button">Envoyer</button>
</form>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, corporis eveniet est, corrupti tempore magnam fugit quis enim soluta nam nemo rerum perspiciatis odio aliquid voluptatem architecto quia natus maxime fugiat recusandae. Molestias consectetur iste velit quidem similique cum enim neque sequi ea, voluptatum architecto, laborum, saepe autem ex reiciendis!</p>