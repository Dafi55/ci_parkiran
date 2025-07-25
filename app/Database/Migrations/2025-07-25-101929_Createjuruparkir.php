<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createjuruparkir extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama'          => ['type' => 'VARCHAR', 'constraint' => 100],
            'no_hp'         => ['type' => 'VARCHAR', 'constraint' => 20],
            'alamat'        => ['type' => 'TEXT'],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true); // Primary key
        $this->forge->createTable('juru_parkir');
    }

    public function down()
    {
        $this->forge->dropTable('juru_parkir');
    }
}
