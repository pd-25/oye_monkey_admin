<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductImageSeeder extends Seeder
{


    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= Product::count(); $i++) {
            $data = new ProductImage();
            $data->product_id = Product::all()->random()->id;
            $data->image =  $faker->imageUrl($width=400, $height=400);
            $data->save();
        }
    }
}
