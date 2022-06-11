<?php

namespace App\Controllers;

class TrajetController extends Controller
{
    public function welcome()
    {
        return $this->view('trajets.welcome');
    }

    public function index()
    {
        $stmt = $this->db->getPDO()->query("select t.id, v.nom as depart, va.nom as arrivee from trajets t join villes v ON (t.fk_depart_id = v.id ) join villes va ON t.fk_arrivee_id = va.id");
        $trajets = $stmt->fetchAll();

        $req = $this->db->getPDO()->query('SELECT * FROM villes ORDER BY nom');
        $villes = $req->fetchAll();

        return $this->view('trajets.index', compact('trajets', 'villes'));
    }

    public function show(int $id)
    {
        $req = $this->db->getPDO()->query('SELECT * FROM trajets');
        $trajets = $req->fetchAll();
        return $this->view('trajets.show', compact('id'));
    }
}