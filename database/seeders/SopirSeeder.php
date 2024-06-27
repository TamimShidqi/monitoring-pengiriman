<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SopirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sopir')->insert([
            'nama' => 'admin',
            'nik' => '1234123412341234',
            'tgl_lahir' => '2001-01-01',
            'alamat' => 'admin',
            'email' => 'admin@gmail.com',
            'no_hp' => '081234567890',
            'masa_sim' => '2001-01-01',
        ]);

        DB::table('sopir')->insert([
            'nama' => 'Muh Tamim Shidqi',
            'nik' => '1207262704040003',
            'tgl_lahir' => '2004-01-27',
            'alamat' => 'Jl. Yasin Salmah',
            'email' => 'mtamimshidqi27@gmail.com',
            'no_hp' => '082311826827',
            'masa_sim' => '2026-09-26',
        ]);

    }
}
