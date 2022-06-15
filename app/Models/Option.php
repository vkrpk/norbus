<?php

namespace App\Models;

class Option extends Model
{
    protected $table = 'options';

    public function getOrders()
    {
       return $this->query("SELECT orders.* FROM orders
        JOIN option_order ON option_order.fk_order_id = orders.id
        WHERE option_order.fk_option_id = ?
        ", [$this->id]);
    }
}