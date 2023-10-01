<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 1; $i<=80; $i++){
        $data = new Product();
        
        $data->category_id = Category::all()->random()->id;
        $data->slug = $faker->unique()->slug(3);
        $data->title = $faker->title;
        $data->price = $faker->randomNumber(3, true);
        $data->discount_price = $faker->randomNumber(3, true);
        $data->short_desc = $faker->text;
        $data->description = $faker->text;
        $data->weight = $faker->randomDigitNotNull();
        $data->dimension = $faker->randomDigitNotNull();
        $data->faqs = $faker->text;
        $data->status = $faker->randomElement(['Available' ,'Out of Stock', 'Inactive']);
        $data->tag = $faker->text;
        $data->meta_data = $faker->text;
        
        // $data->user_id = User::all()->random()->id;
       
       
        $data->save();
        }
    }
}
