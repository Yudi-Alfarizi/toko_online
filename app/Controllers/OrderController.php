<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\ProductModel;

class OrderController extends BaseController
{
    protected $ionAuth;

    public function __construct()
    {
        $this->ionAuth = new \IonAuth\Libraries\IonAuth();
    }

    public function history()
    {
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userId = $this->ionAuth->user()->row()->id;

        $orderModel = new \App\Models\OrderModel();
        $orders = $orderModel
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->findAll();

        $currentTheme = $this->data['currentTheme'];

        return view('themes/' . $currentTheme . '/orders/history', array_merge($this->data, [
            'orders' => $orders
        ]));
    }


    public function show($orderId)
    {
        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();
        $productModel = new ProductModel();

        $order = $orderModel->find($orderId);

        if (!$order || $order['user_id'] !== $this->currentUser->id) {
            return redirect()->to('/orders/history')->with('error', 'Pesanan tidak ditemukan.');
        }

        $items = $orderItemModel->where('order_id', $orderId)->findAll();

        foreach ($items as &$item) {
            $item['product'] = $productModel->find($item['product_id']);
        }

        return view('themes/' . $this->data['currentTheme'] . '/orders/detail', array_merge($this->data, [
            'order' => $order,
            'items' => $items
        ]));
    }
}
