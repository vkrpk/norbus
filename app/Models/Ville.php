<?php

namespace App\Models;

class Ville extends Model
{
    protected $table = 'villes';

    public function getVilles()
    {
        return $this->query("SELECT * FROM villes");
    }
}