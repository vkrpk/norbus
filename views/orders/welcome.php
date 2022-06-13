<?php

foreach ($params['orders'] as $order) {
    foreach ($order->getOptions() as $tag) {
        echo $tag->nom . '<hr>';

    }
}
?>