<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrayValues = ['XS-38', 'S-40', 'M-42', 'L-44', 'XL-46', 'XXL-48'];
       

        $faker = Faker::create();
        for($i = 1; $i<=Product::count(); $i++){
        $data = new Size();
        $data->product_id = Product::all()->random()->id;
        $data->size =  $arrayValues[rand(0,5)];
        $data->save();
        }
    }
}
