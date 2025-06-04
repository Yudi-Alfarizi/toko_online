<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductDetailModel extends Model
{
    protected $table = 'products';

    public function getProductBySlug($slug)
    {
        return $this->select('products.*, brands.name AS brand_name')
            ->join('brands', 'brands.id = products.brand_id', 'left')
            ->where('products.slug', $slug)
            ->first();
    }
}
