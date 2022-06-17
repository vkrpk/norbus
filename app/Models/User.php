<?php

namespace App\Models;

use App\Models\Model;

class User extends Model
{
    protected $table = 'users';

    public function getByMail(string $mail)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE mail = ?", [$mail], true);
    }
}