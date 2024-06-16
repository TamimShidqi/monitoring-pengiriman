<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua data dari tabel sopir
        $sopirRecords = DB::table('sopir')->get();

        foreach ($sopirRecords as $sopir) {
            // Masukkan record ke tabel akuns dengan password dari tgl_lahir yang di-hash
            DB::table('akuns')->insert([
                'sopir_id' => $sopir->id,
                'password' => Hash::make($sopir->tgl_lahir),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}