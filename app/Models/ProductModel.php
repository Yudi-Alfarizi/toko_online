<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Product';

    protected $allowedFields = [
        'parent_id',
        'user_id',
        'brand_id',
        'status',
        'sku',
        'type',
        'name',
        'slug',
        'price',
        'weight',
        'length',
        'width',
        'height',
        'short_description',
        'description',
        'deleted_at',
    ];

    protected $useTimestamps = true;
    // protected $useSoftDeletes = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'id'   => 'permit_empty',
        'type' => 'required',
        'name'    => 'required|min_length[3]',
        'sku' => 'required|is_unique[products.sku,id,{id}]',
        'price' => 'required',
        'status' => 'required',
    ];

    protected $validationMessages = [
        'type' => [
            'required'   => 'Type produk wajib diisi.',
        ],
        'name' => [
            'required'   => 'Nama produk wajib diisi.',
            'min_length' => 'Nama produk minimal harus 3 karakter.',
        ],
        'sku' => [
            'required'   => 'SKU produk wajib diisi.',
        ],
        'price' => [
            'required'   => 'Price produk wajib diisi.',
        ],
        'status' => [
            'required'   => 'Status produk wajib diisi.',
        ],
    ];
    protected $skipValidation     = false;

    protected $beforeInsert = ['generateSlug'];

    const SIMPLE = 'simple';
    const CONFIGURABLE = 'configurable';

    const TYPES = [
        self::SIMPLE => 'Simple',
        self::CONFIGURABLE => 'Configurable',
    ];

    const DRAFT = 0;
    const ACTIVE = 1;
    const INACTIVE = 2;

    const STATUSES = [
        self::DRAFT => 'Draft',
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Inactive',
    ];

    protected function generateSlug(array $data)
    {
        $slug = strtolower(url_title($data['data']['name']));
        $name = trim($data['data']['name']);

        $product = $this->where('name', $name)->orderBy('id', 'DESC')->first();
        if ($product) {
            $slugs = explode('-', $product->slug);
            $slugNumber = !(empty($slugs[1])) ? ((int)$slugs[1] + 1) : 1;
            $slug = $slug . '-' . $slugNumber;
        }

        $data['data']['slug'] = $slug;

        return $data;
    }

    public static function getProductTypesDropdown()
    {
        $types = array_merge(
            [
                '' => '-- Pilih tipe produk --'
            ],
            self::TYPES
        );
        return $types;
    }

    public static function getStatuses()
    {
        $statuses = array_merge(
            [
                '' => '-- Set Status --'
            ],
            self::STATUSES
        );

        return $statuses;
    }
}
