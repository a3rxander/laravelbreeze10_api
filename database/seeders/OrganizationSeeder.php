<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definir los datos de las organizaciones
        $organizations = [
            [
                'name' => 'Organization 1',
                'description' => 'DESC Organization 1',
            ],
            [
                'name' => 'Organization 2',
                'description' => 'DESC Organization 2',
            ],
            [
                'name' => 'Organization 3',
                'description' => 'DESC Organization 3',
            ],
            [
                'name' => 'Organization 4',
                'description' => 'DESC Organization 4',
            ],
            [
                'name' => 'Organization 5',
                'description' => 'DESC Organization 5',
            ],
        ];

        // Insertar los datos en la tabla de organizaciones
        foreach ($organizations as $orgData) {
            Organization::create($orgData);
        }
    }
}
