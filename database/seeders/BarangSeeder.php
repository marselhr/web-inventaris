<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\BarangCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = ["Category1", "Category2", "Category3", "Category4", "Category5"];

        foreach ($categories as $category) {
            $id =  BarangCategory::create(['name' => $category, 'description' => 'desccription'])->id;

            Barang::create([
                'kode' => uniqid('K-IN-HMJ-'),
                'name' => fake()->sentence(4),
                'harga_sewa' => 20000,
                'category_id' => $id,
                'description' => fake()->sentence(),
                'qty' => 2,
                'status' => fake()->randomElement(['b', 'kb', 'rb']),
                'keterangan' => fake()->randomElement(['ada', 'tidak-ada']),
            ]);
        }
    }
}
