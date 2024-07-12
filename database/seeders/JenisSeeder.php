<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Jenis::create([
            'nama' => 'Pertalite'
        ]);

        Jenis::create([
            'nama' => 'Pertamax'
        ]);

        Jenis::create([
            'nama' => 'Pertamina Dex'
        ]);

        Jenis::create([
            'nama' => 'Solar'
        ]);
    }
}
