<?php

namespace App\Controllers;

use App\Models\ProductModel;
use IonAuth\Libraries\IonAuth;
use App\Models\OrderModel;
use App\Models\OrderItemModel;

class CheckoutController extends BaseController
{
    

    public function index()
    {
        if (!$this->auth->loggedIn()) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $productId = $this->request->getGet('product_id');
        $productModel = new ProductModel();

        // Ambil produk dengan lowest_price dan qty (pakai entity Product)
        $product = $productModel
            ->select("products.*, 
                (SELECT MIN(price) FROM products AS variants 
                 WHERE variants.parent_id = products.id AND variants.type = 'simple') AS lowest_price,
                (SELECT qty FROM product_inventories WHERE product_id = products.id LIMIT 1) AS qty")
            ->where('products.id', $productId)
            ->first();

        if (!$product) {
            return redirect()->to('/');
        }

        // Gunakan featured_image dari entity (dengan fallback ke parent_id)
        $featuredImage = $product->featured_image;

        if ($featuredImage && !empty($featuredImage->medium)) {
            $product->featured_image = (object)[
                'medium' => site_url('uploads/' . $featuredImage->medium),
            ];
        } else {
            $product->featured_image = null;
        }

        $currentTheme = $this->data['currentTheme'];

        return view('themes/' . $currentTheme . '/checkout/index', array_merge($this->data, [
            'product' => $product,
        ]));
    }

    public function process()
    {
        if (!$this->currentUser) {
            return redirect()->to('/login')->with('error', 'Harap login dulu');
        }

        $name      = $this->request->getPost('name');
        $phone     = $this->request->getPost('phone');
        $address   = $this->request->getPost('address');
        $productId = $this->request->getPost('product_id');

        $orderModel = new OrderModel();

        $orderId = $orderModel->insert([
            'user_id'    => $this->currentUser->id,
            'user_name'  => $name,
            'email'      => $this->currentUser->email,
            'phone'      => $phone,
            'address'    => $address,
            'status'     => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $orderItemModel = new OrderItemModel();
        $orderItemModel->insert([
            'order_id'   => $orderId,
            'product_id' => $productId,
            'qty'        => 1,
        ]);

        // Kurangi stok
        $db = \Config\Database::connect();
        $db->table('product_inventories')
            ->where('product_id', $productId)
            ->set('qty', 'qty - 1', false)
            ->update();

        return redirect()->to('/payment/simulated/' . $orderId);
    }
}
