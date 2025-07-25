<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSetoran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_petugas'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'tanggal_setoran' => ['type' => 'DATE'],
            'jumlah_setoran'  => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'target' => ['type' => 'int', 'constraint' => '11'],
            'keterangan'      => ['type' => 'TEXT', 'null' => true],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true); // Primary Key

        $this->forge->createTable('setoran_parkir');
    }

    public function down()
    {
        $this->forge->dropTable('setoran_parkir');
    }
}
