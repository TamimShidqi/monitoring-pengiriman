<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('akun')->insert([
            'sopir_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        // DB::table('akun')->insert([
        //     'sopir_id' => 2,
        //     'email' => 'mtamimshidqi27@gmail.com',
        //     'password' => bcrypt('tamim'),
        //     'role' => 'sopir',
        // ]);

    }
}
