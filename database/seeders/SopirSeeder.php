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
    }
}
