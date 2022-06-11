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
<form action="/" method="POST">
    <div>
        <?= insertSelect('Départ', 'depart', $params['villes']) ?>
        <?= insertSelect('Arrivée', 'arrivee', $params['villes']) ?>
    </div>

    <div class="box-dates">
        <?= insertInput('Aller', 'date_fin', 'date') ?>
        <?= insertInput('Retour', 'date_retour', 'date') ?>
    </div>


    <div>
        <?= insertSelect('Adultes', 'adultes', $zeroToDixArray) ?>
        <?= insertSelect('Enfants', 'enfants', $zeroToDixArray) ?>
    </div>

    <div class="box-dates">
        <div>
            <p class="label-btn-radios">Couchette</p>
            <input type="radio" id="contactChoice1"
            name="contact" value="email">
            <label for="contactChoice1">Oui</label>
            <input type="radio" id="contactChoice2"
            name="contact" value="telephone">
            <label for="contactChoice2">Non</label>
        </div>

        <div>
            <p class="label-btn-radios">Aller retour</p>
            <input type="radio" id="contactChoice1"
            name="contact" value="email">
            <label for="contactChoice1">Oui</label>

            <input type="radio" id="contactChoice2"
            name="contact" value="telephone">
            <label for="contactChoice2">Non</label>
        </div>
  </div>
    <button type="submit" class="button">Envoyer</button>
</form>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, corporis eveniet est, corrupti tempore magnam fugit quis enim soluta nam nemo rerum perspiciatis odio aliquid voluptatem architecto quia natus maxime fugiat recusandae. Molestias consectetur iste velit quidem similique cum enim neque sequi ea, voluptatum architecto, laborum, saepe autem ex reiciendis!</p>