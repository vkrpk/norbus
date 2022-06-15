<?php

namespace App\Models;
use DateTime;
use App\Models\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H\hi');
    }

    public function getButton(): string
    {
    return <<<HTML
        <a href="/order/$this->id">Lire cette commande</a>
HTML;
    }

    public function getOptions()
    {
        return $this->query("SELECT o.* FROM options o
        JOIN option_order op ON o.id = op.fk_option_id
        WHERE op.fk_order_id = ?", $this->id);
    }
}