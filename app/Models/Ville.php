<?php

namespace App\Models;

use DateTime;


class Ville extends Model
{
    protected $table = 'villes';

    public function getCreatedAt()
    {
        $date = new DateTime();
        $date = $date->format('d/m/Y H:m');
        return $date;
    }
}