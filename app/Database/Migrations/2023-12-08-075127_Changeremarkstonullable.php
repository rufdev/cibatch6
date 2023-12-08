<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Changeremarkstonullable extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('tickets', [
            'remarks' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ]
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('tickets', [
            'remarks' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ]
        ]);
    }
}
