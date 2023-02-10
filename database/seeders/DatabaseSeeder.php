<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Paket;
use App\Models\Status;
use App\Models\TipeBayar;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Role::create(['name' => 'administrator']);
        // Role::create(['name' => 'pemilik']);
        // Role::create(['name' => 'karyawan']);
        // Role::create(['name' => 'konsumen']);

        Paket::create([
            'nama' => 'Paket Kilat Semalam',
            'jenis' => 'Kilat Express',
            'jumlah_hari' => 1,
            'harga' => 5000,
            'satuan' => 'KG'
        ]);

        Paket::create([
            'nama' => 'Paket Silambat Setahun',
            'jenis' => 'Silambat Express',
            'jumlah_hari' => 360,
            'harga' => 45000,
            'satuan' => 'KG'
        ]);


        TipeBayar::create([
            'nama' => 'Transfer BANK'
        ]);
        TipeBayar::create([
            'nama' => 'Transfer E-Wallet'
        ]);
        TipeBayar::create([
            'nama' => 'CASH'
        ]);

        Status::create([
            'nama' => 'BARU'
        ]);
        Status::create([
            'nama' => 'DIPROSES'
        ]);
        Status::create([
            'nama' => 'SELESAI'
        ]);
        Status::create([
            'nama' => 'DIAMBIL'
        ]);
        Status::create([
            'nama' => 'BATAL'
        ]);
    }
}
