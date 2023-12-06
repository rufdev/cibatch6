<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OfficeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'code' => 'PGSO',
                'name' => 'Provincial General Services Office',
                'email' => 'pgso@bukidnon.gov.ph',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'code' => 'PHRMO',
                'name' => 'Provincial Human Resource Management Office',
                'email' => 'phrmo@bukidnon.gov.ph',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('offices')->insertBatch($data);
    }
}
