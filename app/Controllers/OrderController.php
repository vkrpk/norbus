<?php

namespace App\Controllers;

use App\Models\Option;
use App\Models\Order;
use PDO;

class OrderController extends Controller
{
    public function welcome()
    {
        $order = new Order($this->getDB());
        $orders = $order->all();

        return $this->view('orders.welcome', compact('orders'));
    }

    public function index()
    {
        // $stmt = $this->db->getPDO()->query("select t.id, v.nom as depart, va.nom as arrivee from orders t join villes v ON (t.fk_depart_id = v.id ) join villes va ON t.fk_arrivee_id = va.id");
        // $orders = $stmt->fetchAll();

        // $req = $this->db->getPDO()->query('SELECT * FROM villes ORDER BY nom');
        // $villes = $req->fetchAll();

        // return $this->view('orders.index', compact('orders', 'villes'));
    }

    public function show(int $id)
    {
        $orderModel = new Order($this->getDB());
        $order = $orderModel->query("
            SELECT o.*, v.nom 'ville_depart_aller', va.nom 'ville_depart_retour', CONCAT(u.prenom, ' ', u.nom) as noms FROM orders o JOIN villes v ON o.fk_ville_aller_id = v.id JOIN villes va ON o.fk_ville_retour_id = va.id JOIN users u ON o.fk_user_id = u.id WHERE o.id = ?
        ", [$id], true);

        return $this->view('orders.show', compact('order'));
    }

    public function option(int $id)
    {
        $option = (new Option($this->db))->findById($id);

        return $this->view('orders.option', compact('option'));
    }
}