<?php

namespace App\Models;

use Database\DBConnection;


abstract class Model
{
    protected $table;
    protected $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        $stmt = $this->db->getPDO()->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll();
    }
}