<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'role' => 1,
            'region' => 'Jawa Timur',
            'email' => 'admin@argon.com',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'username' => 'Kepala Cabang 1',
            'firstname' => 'Kepala',
            'lastname' => 'Cabang 1',
            'role' => 3,
            'region' => 'Jawa Timur',
            'email' => 'kepalacabang@gmail.com',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'username' => 'Kepala Pusat 1',
            'firstname' => 'Kepala',
            'lastname' => 'Pusat 1',
            'role' => 2,
            'region' => 'Jawa Timur',
            'email' => 'kepalapusat@gmail.com',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'username' => 'Kepala Pusat 2',
            'firstname' => 'Kepala',
            'lastname' => 'Pusat 2',
            'role' => 2,
            'region' => 'Jawa Timur',
            'email' => 'kepalapusat2@gmail.com',
            'password' => bcrypt('secret')
        ]);
        DB::table('vehicles')->insert([
            'name' => 'Merchedes Benz',
            'type' => 'Akuntan Orang',
            'status' => 'Sewa',
            'plate' => 'L 1234 AB',
            'fuel_consumption' => 50,
            'last_service' => '2023-08-10 00:19:16'
        ]);
        DB::table('vehicles')->insert([
            'name' => 'BMW',
            'type' => 'Akuntan Orang',
            'status' => 'Sewa',
            'plate' => 'L 5678 CD',
            'fuel_consumption' => 50,
            'last_service' => '2023-08-10 00:19:16'
        ]);
    }
}
