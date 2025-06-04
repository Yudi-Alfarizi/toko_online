<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrders extends Migration
{
    public function up()
    {
        // Tabel orders
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'user_name'   => ['type' => 'VARCHAR', 'constraint' => 100],
            'phone'       => ['type' => 'VARCHAR', 'constraint' => 20],
            'address'     => ['type' => 'TEXT'],
            'status'      => ['type' => 'ENUM', 'constraint' => ['pending', 'paid', 'shipped'], 'default' => 'pending'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('orders');

        // Tabel order_items
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'order_id'   => ['type' => 'INT'],
            'product_id' => ['type' => 'INT'],
            'qty'        => ['type' => 'INT', 'default' => 1],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('order_items');
    }

    public function down()
    {
        $this->forge->dropTable('order_items', true);
        $this->forge->dropTable('orders', true);
    }
}
