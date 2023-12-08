<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Fixremarks extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('tickets', 'remarks');
        $this->forge->addColumn('tickets', [
            'remarks' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'description'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tickets', 'remarks');
    }
}
