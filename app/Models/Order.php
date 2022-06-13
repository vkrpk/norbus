<?php

namespace App\Models;
use DateTime;
use App\Models\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H\hm');
    }

    public function getButton(): string
    {
    return <<<HTML
        <a href="/order/$this->id">Lire cette commande</a>
HTML;
    }

    public function getOptions()
    {
        return $this->query("SELECT o.nom FROM options o JOIN option_order op ON o.id = op.fk_option_id JOIN orders ord ON op.fk_order_id = ord.id WHERE ord.id = ?", $this->id);
    }
}