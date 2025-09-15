<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Medicina de Mujeres',        'abbreviation' => 'MED-M', 'category' => 'Medicina'],
            ['name' => 'Medicina de Hombres',        'abbreviation' => 'MED-H', 'category' => 'Medicina'],
            ['name' => 'Cirugía de Mujeres',         'abbreviation' => 'CIR-M', 'category' => 'Cirugía'],
            ['name' => 'Cirugía de Hombres',         'abbreviation' => 'CIR-H', 'category' => 'Cirugía'],
            ['name' => 'UCIA - C',                   'abbreviation' => 'UCIA-C','category' => 'UCI'],
            ['name' => 'UCIP',                       'abbreviation' => 'UCIP',  'category' => 'UCI'],
            ['name' => 'UCIA - A',                   'abbreviation' => 'UCIA-A','category' => 'UCI'],
            ['name' => 'TM, EM, TP',                 'abbreviation' => 'TM/EM/TP','category' => 'Terapias'],
            ['name' => 'Trauma de Hombre',           'abbreviation' => 'TRAUMA-H','category' => 'Trauma'],
            ['name' => 'Especialidades de Hombres',  'abbreviation' => 'ESP-H', 'category' => 'Especialidades'],
            ['name' => 'Ginecología',                'abbreviation' => 'GINE',  'category' => 'Ginecología'],
            ['name' => 'Post Parto',                 'abbreviation' => 'POSTP', 'category' => 'Obstetricia'],
            ['name' => 'Pre Escolares',              'abbreviation' => 'PREESC','category' => 'Pediatría'],
            ['name' => 'Sala Cuna',                  'abbreviation' => 'SCUNA', 'category' => 'Pediatría'],
            ['name' => 'Emergencia',                 'abbreviation' => 'EMG',   'category' => 'Emergencia'],
        ];
        foreach ($services as $r) {
            \App\Models\Service::firstOrCreate(['name'=>$r['name']], $r);
        }
    }
}
