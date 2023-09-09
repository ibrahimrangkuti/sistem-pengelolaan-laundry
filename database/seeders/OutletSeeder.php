<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Outlet::create([
            'nama' => 'Outlet 1',
            'alamat' => 'Jl. Raya Outlet 1',
            'telp' => '081234567890',
        ]);

        Outlet::create([
            'nama' => 'Outlet 2',
            'alamat' => 'Jl. Raya Outlet 2',
            'telp' => '081234567890',
        ]);

        Outlet::create([
            'nama' => 'Outlet 3',
            'alamat' => 'Jl. Raya Outlet 3',
            'telp' => '081234567890',
        ]);
    }
}
