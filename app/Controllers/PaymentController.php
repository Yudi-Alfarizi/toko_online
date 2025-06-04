<?php

namespace App\Controllers;

use Midtrans\Snap;
use Midtrans\Config as MidtransConfig;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\ProductModel;

class PaymentController extends BaseController
{
    public function simulated($orderId)
    {
        helper('form');

        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();
        $productModel = new ProductModel();

        // Ambil order & item
        $order = $orderModel->find($orderId); // <- hasilnya array
        $items = $orderItemModel->where('order_id', $orderId)->findAll(); // array of array

        if (!$order || empty($items)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Order tidak ditemukan');
        }

        // Ambil product
        $product = $productModel->find($items[0]['product_id']);

        // Setup Midtrans
        $midtransConfig = new \Config\Midtrans();
        MidtransConfig::$serverKey = $midtransConfig->serverKey;
        MidtransConfig::$isProduction = $midtransConfig->isProduction;
        MidtransConfig::$overrideNotifUrl = ''; // Optional jika ingin override

        // Setup data Snap
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $order['id'] . '-' . time(),
                'gross_amount' => $product->price,
            ],
            'customer_details' => [
                'first_name' => $order['user_name'],
                'phone' => $order['phone'],
                'email' => $order['email'],
                'billing_address' => [
                    'first_name' => $order['user_name'],
                    'phone' => $order['phone'],
                    'email' => $order['email'],
                    'address' => $order['address'],
                    'city' => 'Indonesia',
                    'country_code' => 'IDN'
                ],
                'shipping_address' => [
                    'first_name' => $order['user_name'],
                    'phone' => $order['phone'],
                    'address' => $order['address'],
                    'city' => 'Indonesia',
                    'country_code' => 'IDN'
                ]
            ],
            'item_details' => [[
                'id' => $product->id,
                'price' => $product->price,
                'quantity' => 1,
                'name' => $product->name,
            ]],
        ];

        $snapToken = Snap::getSnapToken($params);

        $currentTheme = $this->data['currentTheme'];

        return view('themes/' . $currentTheme . '/payment/snap', array_merge($this->data, [
            'snapToken' => $snapToken,
            'clientKey' => $midtransConfig->clientKey,
            'order' => $order,
        ]));
    }

    public function success($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        $order = $orderModel->find($orderId);

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Order tidak ditemukan');
        }

        // Update status order menjadi 'paid'
        $orderModel->update($orderId, [
            'status' => 'paid'
        ]);

        // Ambil ulang data terbaru
        $order = $orderModel->find($orderId);

        $currentTheme = $this->data['currentTheme'];

        return view('themes/' . $currentTheme . '/payment/success', array_merge($this->data, [
            'order' => $order
        ]));
    }
}
