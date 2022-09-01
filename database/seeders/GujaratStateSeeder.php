<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class GujaratStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // City::truncate();

        $gujCity = [
            ["city" => "Ahmedabad", "pincode" => "395001"],
            ["city" => "Surat", "pincode" => "395002"],
            ["city" => "Vadodara", "pincode" => "395003"],
            ["city" => "Rajkot", "pincode" => "395004"],
            ["city" => "Bhavnagar", "pincode" => "395005"],
            ["city" => "Jamnagar", "pincode" => "395006"],
            ["city" => "Junagadh", "pincode" => "395007"],
            ["city" => "Gandhinagar", "pincode" => "395008"],
            ["city" => "Gandhidham", "pincode" => "395009"],
            ["city" => "Anand", "pincode" => "395010"],
            ["city" => "Navsari", "pincode" => "395011"],
            ["city" => "Morbi", "pincode" => "395012"],
            ["city" => "Nadiad", "pincode" => "395013"],
            ["city" => "Surendranagar", "pincode" => "395014"],
            ["city" => "Bharuch", "pincode" => "395015"],
            ["city" => "Mehsana", "pincode" => "395016"],
            ["city" => "Bhuj", "pincode" => "395017"],
            ["city" => "Porbandar", "pincode" => "395018"],
            ["city" => "Palanpur", "pincode" => "395019"],
            ["city" => "Valsad", "pincode" => "395020"],
            ["city" => "Vapi", "pincode" => "395021"],
            ["city" => "Gondal", "pincode" => "395022"],
            ["city" => "Veraval", "pincode" => "395023"],
            ["city" => "Godhra", "pincode" => "395024"],
            ["city" => "Patan", "pincode" => "395025"],
            ["city" => "Kalol", "pincode" => "395026"],
            ["city" => "Dahod", "pincode" => "395027"],
            ["city" => "Botad", "pincode" => "395028"],
            ["city" => "Amreli", "pincode" => "395029"],
            ["city" => "Deesa", "pincode" => "395030"],
            ["city" => "Jetpur", "pincode" => "395031"]
        ];

        foreach ($gujCity as $key => $city) {
            City::create($city);
        }

    }
}
