<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 1; $i<=Product::count(); $i++){
        $data = new Color();
        $data->product_id = Product::all()->random()->id;
        $data->color_name = $faker->safeColorName;
        $data->save();
        }
    }
}
