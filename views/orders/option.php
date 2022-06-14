<h1><?= $params['option']->nom?></h1>

<ul>
    <?php foreach ($params['option']->getOrders() as $order): ?>
        <li>
            <a href="/order/<?= $order->id ?>"><?= $order->id ?></a>
        </li>
    <?php endforeach; ?>
</ul>