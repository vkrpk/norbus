<?php
require VIEWS . 'includes/form/input.php';
$zeroToDixArray = [];
for ($i=0; $i <= 10 ; $i++) {
    $objet = new stdClass;
    $objet->id = $i;
    $objet->nom = $i;
    $zeroToDixArray[] = $objet;
}
?>
<h1>Formulaire de modification de la commande <?= $params['order']->id ?></h1>
<?php
//  dd($params['order']->getVilleDepart($params['order']->id)->nom)
 ?>

<form action="/admin/order/edit/<?= $params['order']->id ?>" method="POST" class="form-add-order">
    <div>
        <?= insertSelect('Départ', 'depart', $params['villes'], $params['order']->fk_ville_depart_id) ?>
        <?= insertSelect('Arrivée', 'arrivee', $params['villes'], $params['order']->fk_ville_arrivee_id) ?>
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