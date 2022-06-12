<?php
$date = (new DateTime($params['order']->created_at))->format('d/m/Y à H\hm');
?>

<h1>Récapitulatif de la commande n° <?= $params['order']->id?></h1>
<p>Utilisateur :<?= $params['order']->noms?></p>
<p>Ville de départ (aller) = <?= $params['order']->ville_depart_aller ?></p>
<p>Ville de départ (retour) = <?= $params['order']->ville_depart_retour?></p>
<p>Couchette : <?= $params['order']->couchette === 1 ? 'Oui' : 'Non';?></p>
<p>Nombre de places : <?= $params['order']->place?></p>
<p>Créé le : <?= $date ?></p>