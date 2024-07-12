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

        DB::table('sopir')->insert([
            'nama' => 'Ahmad Fauzi',
            'nik' => '1234567890123456',
            'tgl_lahir' => '1985-05-15',
            'alamat' => 'Jl. Merpati No. 10',
            'email' => 'ahmad.fauzi@example.com',
            'no_hp' => '081234567891',
            'masa_sim' => '2025-05-15',
        ]);

        DB::table('sopir')->insert([
            'nama' => 'Budi Santoso',
            'nik' => '1234567890123458',
            'tgl_lahir' => '1975-07-07',
            'alamat' => 'Jl. Melati No. 12',
            'email' => 'budi.santoso@example.com',
            'no_hp' => '081234567893',
            'masa_sim' => '2025-07-07',
        ]);

        DB::table('sopir')->insert([
            'nama' => 'Rudi Hartono',
            'nik' => '1234567890123461',
            'tgl_lahir' => '1988-04-30',
            'alamat' => 'Jl. Cempaka No. 3',
            'email' => 'rudi.hartono@example.com',
            'no_hp' => '081234567896',
            'masa_sim' => '2025-04-30',
        ]);

        DB::table('sopir')->insert([
            'nama' => 'Taufik Hidayat',
            'nik' => '1234567890123463',
            'tgl_lahir' => '1980-12-25',
            'alamat' => 'Jl. Dahlia No. 11',
            'email' => 'taufik.hidayat@example.com',
            'no_hp' => '081234567898',
            'masa_sim' => '2025-12-25',
        ]);

        // Tambahan 5 data sopir lagi dengan nama laki-laki
        DB::table('sopir')->insert([
            'nama' => 'Slamet Riyadi',
            'nik' => '1234567890123470',
            'tgl_lahir' => '1990-06-15',
            'alamat' => 'Jl. Mawar No. 21',
            'email' => 'slamet.riyadi@example.com',
            'no_hp' => '081234567895',
            'masa_sim' => '2026-06-15',
        ]);

        DB::table('sopir')->insert([
            'nama' => 'Agus Widodo',
            'nik' => '1234567890123471',
            'tgl_lahir' => '1988-04-30',
            'alamat' => 'Jl. Cempaka No. 3',
            'email' => 'agus.widodo@example.com',
            'no_hp' => '081234567896',
            'masa_sim' => '2025-04-30',
        ]);

        DB::table('sopir')->insert([
            'nama' => 'Dedi Supriyadi',
            'nik' => '1234567890123472',
            'tgl_lahir' => '1995-09-12',
            'alamat' => 'Jl. Flamboyan No. 7',
            'email' => 'dedi.supriyadi@example.com',
            'no_hp' => '081234567897',
            'masa_sim' => '2027-09-12',
        ]);

        DB::table('sopir')->insert([
            'nama' => 'Hariyanto',
            'nik' => '1234567890123473',
            'tgl_lahir' => '1980-12-25',
            'alamat' => 'Jl. Dahlia No. 11',
            'email' => 'hariyanto@example.com',
            'no_hp' => '081234567898',
            'masa_sim' => '2025-12-25',
        ]);

        DB::table('sopir')->insert([
            'nama' => 'Andi Prasetyo',
            'nik' => '1234567890123474',
            'tgl_lahir' => '1998-11-05',
            'alamat' => 'Jl. Teratai No. 9',
            'email' => 'andi.prasetyo@example.com',
            'no_hp' => '081234567899',
            'masa_sim' => '2028-11-05',
        ]);


    }
}
