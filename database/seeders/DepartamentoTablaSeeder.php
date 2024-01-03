<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departament;
class DepartamentoTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departament::create([
            'nombre' => 'Tecnologias de la informacion',
        ]);
        
        Departament::create([
            'nombre' => 'Legal',
        ]);

        Departament::create([
            'nombre' => 'Seguridad',
        ]);
    }
}
