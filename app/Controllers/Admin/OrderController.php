<?php

namespace App\Controllers\Admin;

use App\Models\Order;
use App\Models\Ville;
use App\Controllers\Controller;
use App\Models\Option;

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

    public function update(int $id)
    {
        $order = new Order($this->getDB());
        $result = $order->update($id, $_POST);

        if($result){
            return header('Location: /admin/orders');
        }
    }

    public function edit(int $id)
    {
        $order = (new Order($this->getDB()))->findById($id);
        $villes = (new Ville($this->getDB()))->getVilles();
        $options = (new Option($this->getDB()))->all();

        return $this->view('admin.order.edit', compact('order', 'villes', 'options'));
    }
}