<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;
class DepartamentoTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departamento::create([
            'nombre' => 'Tecnologias de la informacion',
        ]);
        
        Departamento::create([
            'nombre' => 'Legal',
        ]);

        Departamento::create([
            'nombre' => 'Seguridad',
        ]);
    }
}
