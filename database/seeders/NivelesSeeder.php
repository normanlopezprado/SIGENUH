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
            ['id' => (string) Str::uuid(), 'name' => '1ro', 'status' => true],
            ['id' => (string) Str::uuid(), 'name' => '2do', 'status' => true],
            ['id' => (string) Str::uuid(), 'name' => '3ro', 'status' => true],
            ['id' => (string) Str::uuid(), 'name' => '4to', 'status' => true],
            ['id' => (string) Str::uuid(), 'name' => '5to', 'status' => true],
        ];

        foreach ($niveles as $nivel) {
            Nivel::firstOrCreate(['name' => $nivel['name']], $nivel);
        }
    }
}
