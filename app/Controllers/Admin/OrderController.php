<?php

namespace App\Controllers\Admin;

use App\Models\Order;
use App\Models\Ville;
use App\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $order = new Order($this->getDB());
        $orders = $order->all();

        return $this->view('admin.order.index', compact('orders'));
    }

    public function destroy(int $id)
    {
        $order = new Order($this->getDB());

        $result = $order->destroy($id);

        if($result){
            return header('Location: /admin/orders');
        }
    }

    public function edit(int $id)
    {
        $order = (new Order($this->getDB()))->findById($id);
        $villes = (new Ville($this->getDB()))->getVilles();

        return $this->view('admin.order.edit', compact('order', 'villes'));
    }
}