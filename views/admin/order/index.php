<h1>Administration des articles</h1>

<table>
    <caption>Résumé des réservations</caption>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Réservé le</th>
            <th scope="col">Ville de départ</th>
            <th scope="col">Date départ</th>
            <th scope="col">Ville d'arrivée</th>
            <th scope="col">Date retour</th>
            <th scope="col">Aller-retour</th>
            <th scope="col">Adultes</th>
            <th scope="col">Enfants</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php

use App\Models\Ville;

 foreach ($params['orders'] as $order): ?>
            <tr>
                <td data-label="id"><?= $order->id ?></td>
                <td data-label="created_at"><?= $order->created_at?></td>

                <td data-label="ville_depart">
                    <?= $order->getVilleDepart($order->id)->nom;?>
                </td>
                <td data-label="date_depart"><?= $order->date_aller?></td>
                <td data-label="ville_arrivee">
                    <?= $order->getVilleArrivee($order->id)->nom;?>
                </td>
                <td data-label="date_retour"><?= $order->date_retour?></td>
                <td data-label="isAllerRetour"><?= $order->bool_aller_retour == 1 ? 'Oui' : 'Non' ?></td>
                <td data-label="adulte"><?= $order->adulte?></td>
                <td data-label="enfant"><?= $order->enfant?></td>
                <td data-label="action">
                    <a href="/admin/order/edit/<?= $order->id ?>">Modifier</a>
                    <form action="/admin/oder/delete/<?= $order->id ?>" method="POST">
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>