<?php

namespace App\Models;

use CodeIgniter\Model;

class AttributeOptionModel extends Model
{
    protected $table      = 'attribute_options';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\AttributeOption';

    protected $allowedFields = ['attribute_id', 'name', 'slug'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'name' => 'required|is_unique[attribute_options.name,id,{id}]|min_length[3]',
    ];

    protected $validationMessages = [
        'name' => [
            'required'   => 'Nama kategori wajib diisi.',
            'is_unique'  => 'Nama kategori sudah digunakan. Silakan pilih nama lain.',
            'min_length' => 'Nama kategori minimal harus 3 karakter.',
        ],
    ];
    protected $skipValidation     = false;

    protected $beforeInsert = ['generateSlug'];

    protected function generateSlug(array $data)
    {
        $slug = strtolower(url_title($data['data']['name']));
        $data['data']['slug'] = $slug;

        return $data;
    }
}
