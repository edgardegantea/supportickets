<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prioridad extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'varchar', 'constraint' => 5],
            'name'          => ['type' => 'varchar', 'constraint' => 150, 'unique' => true],
            'slug'          => ['type' => 'varchar', 'constraint' => 150],
            'created_at'    => ['type' => 'datetime', 'null' => false],
            'updated_at'    => ['type' => 'datetime', 'null' => true]
        ]);

        $this->forge->addKey('id', false);
        $this->forge->createTable('priorities', true);
    }

    public function down()
    {
        $this->forge->dropTable('priorities', true);
    }
}
