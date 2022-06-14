<?php

namespace App\Models;

use PDO;
use DateTime;
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
        return $this->query("SELECT * FROM {$this->table}");
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * from {$this->table} WHERE id = ?", $id, true);
    }

    public function query(string $sql, int $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';
        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        if($method === 'query') {
            return $stmt->$fetch();
        } else {
            $stmt->execute([$param]);
            return $stmt->$fetch();
        }
    }


}