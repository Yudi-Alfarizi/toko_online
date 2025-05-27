<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    public function index(): string
    {
        $categoryModel = new CategoryModel();
        $productModel = new ProductModel();

        $this->data['categories'] = $categoryModel->getNestedCategories();

        // ambil trending items dari produk dengan harga tertinggi
        $productModel = new ProductModel();

        $this->data['trendingItems'] = $productModel
            ->select('
        products.*,
        product_images.medium as image,
        (
            SELECT MIN(price)
            FROM products AS variants
            WHERE variants.parent_id = products.id AND variants.status = 1
        ) AS real_price
    ')
            ->join('product_images', 'product_images.product_id = products.id', 'left')
            ->where('products.status', 1)
            ->where('products.parent_id IS NULL') // hanya ambil produk parent
            ->orderBy('real_price', 'DESC')
            ->groupBy('products.id')
            ->limit(8)
            ->findAll();


        return view('themes/' . $this->data['currentTheme'] . '/pages/home', $this->data);
    }
}
