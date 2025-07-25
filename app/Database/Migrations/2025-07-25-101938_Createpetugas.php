<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createpetugas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'username'      => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'password'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'nama_lengkap'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true); // Primary key
        $this->forge->createTable('petugas');
    }

    public function down()
    {
        $this->forge->dropTable('petugas');
    }
}
