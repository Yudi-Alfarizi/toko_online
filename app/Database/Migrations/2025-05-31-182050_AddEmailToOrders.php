<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmailToOrders extends Migration
{
    public function up()
    {
        $this->forge->addColumn('orders', [
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'user_name',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('orders', 'email');
    }
}
