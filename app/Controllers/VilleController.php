<?php

namespace App\Controllers;

use App\Models\Ville;
use App\Controllers\Controller;

class VilleController extends Controller
{
    public function index()
    {
        $ville = new Ville($this->getDB());
        $villes = $ville->all();
        return $this->view('orders.index', compact('villes'));
    }
}