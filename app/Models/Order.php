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
        WHERE op.fk_order_id = ?", [$this->id]);
    }

    public function create(array $data,  $relations = null)
    {
        // dd($relations);
        if(!array_key_exists('bool_aller_retour', $data)){
            $data['bool_aller_retour'] = '1';
            $relations =[];
            $relations[] = '1';
        }
        parent::create($data);
        $id = $this->query("SELECT id FROM orders ORDER BY id DESC LIMIT 1");
        $id = $id[0]->id;
        foreach ($relations as $optionId) {
            $stmt = $this->db->getPDO()->prepare("INSERT INTO option_order (fk_option_id, fk_order_id) VALUES (?, ?)");
            $stmt->execute([$optionId, $id]);
        }

        return true;
    }

    public function getVilleDepart(int $id)
    {
        $stmt = $this->db->getPDO()->prepare("SELECT v.nom FROM villes v JOIN orders o ON v.id = o.fk_ville_depart_id WHERE o.id = ?");
        $stmt->execute([$id]);
        $ville = ($stmt->fetch());
        return $ville;
    }

    public function getVilleArrivee(int $id)
    {
        $stmt = $this->db->getPDO()->prepare("SELECT v.nom FROM villes v JOIN orders o ON v.id = o.fk_ville_arrivee_id WHERE o.id = ?");
        $stmt->execute([$id]);
        $ville = ($stmt->fetch());
        return $ville;
    }

    public function update(int $id, array $data, ?array $relations = null)
    {
        parent::update($id, $data);

        $stmt = $this->db->getPDO()->prepare("DELETE FROM option_order WHERE fk_order_id = ?");
        $result = $stmt->execute([$id]);

        foreach ($relations as $optionId) {
            $stmt = $this->db->getPDO()->prepare("INSERT INTO option_order (fk_option_id, fk_order_id) VALUES (?, ?)");
            $stmt->execute([$optionId, $id]);
        }

        if($result) {
            return true;
        }
    }
}