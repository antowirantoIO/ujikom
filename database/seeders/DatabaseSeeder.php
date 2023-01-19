<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Role::create(['name' => 'administrator']);
        Role::create(['name' => 'pemilik']);
        Role::create(['name' => 'karyawan']);
        Role::create(['name' => 'konsumen']);
        
    }
}
