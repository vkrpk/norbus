<?php

namespace App\Models;

use DateTime;


class Option extends Model
{
    protected $table = 'options';

    public function getCreatedAt()
    {
        $date = new DateTime();
        $date = $date->format('d/m/Y H:m');
        return $date;
    }
}