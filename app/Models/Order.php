<?php
namespace App\Models;

use DateTime;

class Order extends Model
{
    protected string $table = 'orders';

    public function getCreatedAt()
    {
        $date = new DateTime();
        $date = $date->format('d/m/Y H\hm');
        return $date;
    }
}