<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OfficeTable extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'INT', // INT(11)
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'code' => [
                'type' => 'VARCHAR', // VARCHAR(255)
                'constraint' => 255,
                'null' => false,
            ],
            'name' => [
                'type' => 'VARCHAR', // VARCHAR(255)
                'constraint' => 255,
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR', // VARCHAR(255)
                'constraint' => 255,
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('offices');
    }

    public function down()
    {
        $this->forge->dropTable('offices');
    }
}
