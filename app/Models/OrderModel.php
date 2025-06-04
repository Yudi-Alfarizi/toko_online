<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array'; // atau 'object' jika kamu pakai entity
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'user_id',
        'user_name',
        'email',
        'phone',
        'address',
        'status',
        'created_at',
    ];

    protected $useTimestamps = false; // pakai true jika kamu punya updated_at

    // Tambahkan rules kalau mau validasi
    protected $validationRules = [];
}
