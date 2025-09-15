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
            ['name' => 'Cirugía',           'abbreviation' => 'CM',  'category' => 'Mujeres'],
            ['name' => 'Cirugía',           'abbreviation' => 'CH',  'category' => 'Hombres'],
            ['name' => 'Especialidad',      'abbreviation' => 'EM',  'category' => 'Mujeres'],
            ['name' => 'Especialidad',      'abbreviation' => 'EH',  'category' => 'Hombres'],
            ['name' => 'Medicina Interna',  'abbreviation' => 'MIH', 'category' => 'Hombres'],
            ['name' => 'Medicina Interna',  'abbreviation' => 'MIM', 'category' => 'Mujeres'],
            ['name' => 'Traumatología',     'abbreviation' => 'TM',  'category' => 'Mujeres'],
            ['name' => 'Traumatología',     'abbreviation' => 'TH',  'category' => 'Hombres'],
        ];
        foreach ($services as $r) {
            \App\Models\Service::firstOrCreate(['name'=>$r['name']], $r);
        }
    }
}
