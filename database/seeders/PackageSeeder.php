<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::create([
            'outlet_id' => 1,
            'nama_paket' => 'Cuci Kering',
            'harga' => 10000,
            'jenis' => 'Kiloan',
        ]);
        Package::create([
            'outlet_id' => 1,
            'nama_paket' => 'Cuci Setrika',
            'harga' => 15000,
            'jenis' => 'Kiloan',
        ]);
        Package::create([
            'outlet_id' => 2,
            'nama_paket' => 'Cuci Kering',
            'harga' => 10000,
            'jenis' => 'Kiloan',
        ]);
        Package::create([
            'outlet_id' => 2,
            'nama_paket' => 'Cuci Setrika',
            'harga' => 15000,
            'jenis' => 'Kiloan',
        ]);
        Package::create([
            'outlet_id' => 3,
            'nama_paket' => 'Cuci Kering',
            'harga' => 10000,
            'jenis' => 'Kiloan',
        ]);
        Package::create([
            'outlet_id' => 3,
            'nama_paket' => 'Cuci Setrika',
            'harga' => 15000,
            'jenis' => 'Kiloan',
        ]);
    }
}
