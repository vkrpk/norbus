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
        <?= insertSelect('Départ', 'fk_ville_depart_id', $params['villes'], $params['order']->fk_ville_depart_id) ?>
        <?= insertSelect('Arrivée', 'fk_ville_arrivee_id', $params['villes'], $params['order']->fk_ville_arrivee_id) ?>
    </div>

    <div class="box-select">
        <?= insertInput('Aller', 'date_aller', 'date', $params['order']->date_aller) ?>
        <?= insertInput('Retour', 'date_retour', 'date', $params['order']->date_retour) ?>
    </div>

    <div>
        <?= insertSelect('Adultes', 'adulte', $zeroToDixArray, $params['order']->adulte) ?>
        <?= insertSelect('Enfants', 'enfant', $zeroToDixArray, $params['order']->enfant) ?>
    </div>

    <fieldset>
        <legend>Veuillez sélectionner vos options</legend>
        <?php foreach($params['options'] as $option):?>
                <div class="form-check">
                    <input type="checkbox" value="<?=$option->id?>" id="<?=$option->nom?>" name="options[]"></input>
                    <label for="<?=$option->nom?>"><?=$option->nom?></label>
                </div>
            <?php endforeach;?>
    </fieldset>

    <div class="form-radios">
        <?php
            if($params['order']->bool_aller_retour == 1) {
                $oui = 'checked';
                $non = '';
            } else {
                $non = 'checked';
                $oui = '';
            }
        ?>
        <p class="label-btn-radios">Aller retour</p>
        <input type="radio" id="oui"
        name="bool_aller_retour" value="1" <?= $oui ?>>
        <label for="oui">Oui</label>

        <input type="radio" id="non"
        name="bool_aller_retour" value="0" <?= $non ?>>
        <label for="non">Non</label>
    </div>

    <button type="submit" class="button">Envoyer</button>
</form>