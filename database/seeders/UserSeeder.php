<?php

namespace Database\Seeders;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        // Admin
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        // Owner
        User::create([
            'outlet_id' => 1,
            'nama' => 'Owner 1',
            'email' => 'owner1@gmail.com',
            'password' => bcrypt('owner1'),
            'role' => 'owner'
            // [
            //     'outlet_id' => 2,
            //     'nama' => 'Owner 2',
            //     'email' => 'owner2@gmail.com',
            //     'password' => bcrypt('123'),
            //     'role' => 'owner'
            // ],
            // [
            //     'outlet_id' => 3,
            //     'nama' => 'Owner 3',
            //     'email' => 'owner3@gmail.com',
            //     'password' => bcrypt('123'),
            //     'role' => 'owner'
            // ],
        ]);

        // Kasir
        // for ($i = 0; $i < 10; $i++) {
        //     $nama = $faker->unique()->firstName() . ' ' . $faker->lastName();
        //     User::create([
        //         'outlet_id' => $faker->randomElement([1, 2, 3]),
        //         'nama' => $nama,
        //         'email' => strtolower(str_replace(' ', '', $nama)) . $faker->randomNumber(2) . '@gmail.com',
        //         'password' => bcrypt('123'),
        //         'role' => 'kasir',
        //     ]);
        // }
        User::create([
            'outlet_id' => 1,
            'nama' => 'Kasir 1',
            'email' => 'kasir1@gmail.com',
            'password' => bcrypt('kasir1'),
            'role' => 'kasir'
        ]);
    }
}
