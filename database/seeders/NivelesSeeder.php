<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Nivel;

class NivelesSeeder extends Seeder
{
    public function run(): void
    {
        $niveles = [
            ['id' => (string) Str::uuid(), 'name' => '1er Piso', 'status' => true],
            ['id' => (string) Str::uuid(), 'name' => '2do Piso', 'status' => true],
            ['id' => (string) Str::uuid(), 'name' => '3er Piso', 'status' => true],
        ];

        foreach ($niveles as $nivel) {
            Nivel::firstOrCreate(['name' => $nivel['name']], $nivel);
        }
    }
}
