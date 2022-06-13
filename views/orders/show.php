<h1>Récapitulatif de la commande n° <?= $params['order']->id?></h1>
<p>Utilisateur :<?= $params['order']->noms?></p>
<p>Ville de départ (aller) = <?= $params['order']->ville_depart_aller ?></p>
<p>Ville de départ (retour) = <?= $params['order']->ville_depart_retour?></p>
<p>Couchette : <?= $params['order']->couchette === 1 ? 'Oui' : 'Non';?></p>
<p>Nombre de places : <?= $params['order']->place?></p>
<p>Créé le : <?= $params['order']->getCreatedAt() ?></p>
<?php foreach ($params['order']->getOptions() as $i): ?>
    <p><?= $i->nom ?></p>
<?php endforeach ?>