<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ProductImageModel;
use App\Models\ProductAttributeValueModel;

class ProductController extends BaseController
{
    public function detail($slug)
    {
        $productModel = new ProductModel();
        $imageModel = new ProductImageModel();
        $attributeValueModel = new ProductAttributeValueModel();

        // Ambil produk dengan lowest_price varian jika ada
        $product = $productModel
            ->select("products.*, 
                  (SELECT MIN(price) FROM products AS variants WHERE variants.parent_id = products.id AND variants.type = 'simple') AS lowest_price")
            ->where('slug', $slug)
            ->first();

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Produk tidak ditemukan.");
        }

        // Ubah ke array agar bisa modifikasi
        $productArray = $product->toArray();

        // Ambil gambar
        $images = $imageModel->where('product_id', $product->id)->findAll();

        // Ambil atribut varian
        $attributesRaw = $attributeValueModel
            ->select('attributes.name as attr_name, attribute_options.name as option_name')
            ->join('attributes', 'attributes.id = product_attribute_values.attribute_id')
            ->join('attribute_options', 'attribute_options.id = product_attribute_values.attribute_option_id')
            ->where('product_attribute_values.parent_product_id', $product->id)
            ->findAll();

        $grouped = [];
        foreach ($attributesRaw as $row) {
            $grouped[$row->attr_name][] = [
                'text_value' => $row->option_name,
            ];
        }

        $productArray['attributes'] = [];
        foreach ($grouped as $name => $options) {
            $productArray['attributes'][] = [
                'name' => $name,
                'options' => $options,
            ];
        }

        $variants = $productModel
            ->where('parent_id', $product->id)
            ->where('type', 'simple')
            ->findAll();

        $productArray['variants'] = $variants;

        $currentTheme = $this->data['currentTheme'];

        return view('themes/' . $currentTheme . '/products/detail', array_merge($this->data, [
            'product' => $productArray,
            'images' => $images,
        ]));
    }
}
