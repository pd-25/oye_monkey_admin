<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "full_name" => "Admin tshirt",
            "email" => "admin@mail.com",
            "country" => "India",
            "address1" => "Durgapur",
            "password" => Hash::make("12345"),
      
        ]);
    }
}
