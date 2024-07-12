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
            'nama' => 'Dewi Sartika',
            'nik' => '1234567890123457',
            'tgl_lahir' => '1990-03-20',
            'alamat' => 'Jl. Kenanga No. 5',
            'email' => 'dewi.sartika@example.com',
            'no_hp' => '081234567892',
            'masa_sim' => '2025-03-20',
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
            'nama' => 'Sri Rahayu',
            'nik' => '1234567890123459',
            'tgl_lahir' => '1982-11-25',
            'alamat' => 'Jl. Anggrek No. 8',
            'email' => 'sri.rahayu@example.com',
            'no_hp' => '081234567894',
            'masa_sim' => '2025-11-25',
        ]);

        // Tambahan 5 data sopir lagi dengan nama laki-laki
        DB::table('sopir')->insert([
            'nama' => 'Siti Aminah',
            'nik' => '1234567890123460',
            'tgl_lahir' => '1992-06-15',
            'alamat' => 'Jl. Mawar No. 21',
            'email' => 'siti.aminah@example.com',
            'no_hp' => '081234567895',
            'masa_sim' => '2026-06-15',
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
            'nama' => 'Yulia Andriani',
            'nik' => '1234567890123462',
            'tgl_lahir' => '1995-09-12',
            'alamat' => 'Jl. Flamboyan No. 7',
            'email' => 'yulia.andriani@example.com',
            'no_hp' => '081234567897',
            'masa_sim' => '2027-09-12',
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

        DB::table('sopir')->insert([
            'nama' => 'Lisa Marlina',
            'nik' => '1234567890123464',
            'tgl_lahir' => '1998-11-05',
            'alamat' => 'Jl. Teratai No. 9',
            'email' => 'lisa.marlina@example.com',
            'no_hp' => '081234567899',
            'masa_sim' => '2028-11-05',
        ]);

    }
}
