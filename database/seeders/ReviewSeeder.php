<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= Product::count(); $i++) {
            $data = new Review();
            $data->product_id = Product::all()->random()->id;
            $data->name =  $faker->title;
            $data->email =  $faker->email();
            $data->comment =  $faker->text;
            $data->star =  rand(0,5);
            $data->save();
        }
    }
}
