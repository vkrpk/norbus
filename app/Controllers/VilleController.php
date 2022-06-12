<?php

namespace App\Controllers;

class VilleController extends Controller
{
    public function index()
    {
        $stmt = $this->db->getPDO()->query('SELECT * FROM villes ORDER by nom');
        $villes = $stmt->fetchAll();

        return $this->view('orders.index', compact('villes'));
    }
}