<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'role' => '0',
            'name' => 'Lovy',
            'email' => 'hmjti@gmail.com',
            'organisasi' => 'HMJ TI Undiksha',
            'password' => Hash::make('password')
        ]);

        $this->call(
            BarangSeeder::class
        );
    }
}
