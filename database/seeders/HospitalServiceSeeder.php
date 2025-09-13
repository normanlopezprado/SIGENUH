<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Medicina de Mujeres',        'abbreviation' => 'MED-M', 'category' => 'Medicina', 'status' => true],
            ['name' => 'Medicina de Hombres',        'abbreviation' => 'MED-H', 'category' => 'Medicina', 'status' => true],
            ['name' => 'Cirugía de Mujeres',         'abbreviation' => 'CIR-M', 'category' => 'Cirugía', 'status' => true],
            ['name' => 'Cirugía de Hombres',         'abbreviation' => 'CIR-H', 'category' => 'Cirugía', 'status' => true],
            ['name' => 'UCIA - C',                   'abbreviation' => 'UCIA-C','category' => 'UCI', 'status' => true],
            ['name' => 'UCIP',                       'abbreviation' => 'UCIP',  'category' => 'UCI', 'status' => true],
            ['name' => 'UCIA - A',                   'abbreviation' => 'UCIA-A','category' => 'UCI', 'status' => true],
            ['name' => 'TM, EM, TP',                 'abbreviation' => 'TM/EM/TP','category' => 'Terapias', 'status' => true],
            ['name' => 'Trauma de Hombre',           'abbreviation' => 'TRAUMA-H','category' => 'Trauma', 'status' => true],
            ['name' => 'Especialidades de Hombres',  'abbreviation' => 'ESP-H', 'category' => 'Especialidades', 'status' => true],
            ['name' => 'Ginecología',                'abbreviation' => 'GINE',  'category' => 'Ginecología', 'status' => true],
            ['name' => 'Post Parto',                 'abbreviation' => 'POSTP', 'category' => 'Obstetricia', 'status' => true],
            ['name' => 'Pre Escolares',              'abbreviation' => 'PREESC','category' => 'Pediatría', 'status' => true],
            ['name' => 'Sala Cuna',                  'abbreviation' => 'SCUNA', 'category' => 'Pediatría', 'status' => true],
            ['name' => 'Emergencia',                 'abbreviation' => 'EMG',   'category' => 'Emergencia', 'status' => true],
        ];
        foreach ($services as $r) {
            \App\Models\HospitalService::firstOrCreate(['name'=>$r['name']], $r);
        }
    }
}
