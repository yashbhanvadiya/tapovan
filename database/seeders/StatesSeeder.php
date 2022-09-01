<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // State::truncate();

        $states = [
            ["state" => "Andaman and Nicobar"],
            ["state" => "Andhra Pradesh"],
            ["state" => "Arunachal Pradesh"],
            ["state" => "Assam"],
            ["state" => "Bihar"],
            ["state" => "Chandigarh"],
            ["state" => "Chhattisgarh"],
            ["state" => "Dadra and Nagar Haveli"],
            ["state" => "Daman and Diu"],
            ["state" => "Delhi"],
            ["state" => "Goa"],
            ["state" => "Gujarat"],
            ["state" => "Haryana"],
            ["state" => "Himachal Pradesh"],
            ["state" => "Jammu and Kashmir"],
            ["state" => "Jharkhand"],
            ["state" => "Karnataka"],
            ["state" => "Kerala"],
            ["state" => "Lakshadweep"],
            ["state" => "Madhya Pradesh"],
            ["state" => "Maharashtra"],
            ["state" => "Manipur"],
            ["state" => "Meghalaya"],
            ["state" => "Mizoram"],
            ["state" => "Nagaland"],
            ["state" => "Orissa"],
            ["state" => "Puducherry"],
            ["state" => "Punjab"],
            ["state" => "Rajasthan"],
            ["state" => "Sikkim"],
            ["state" => "Tamil Nadu"],
            ["state" => "Telangana"],
            ["state" => "Tripura"],
            ["state" => "Uttar Pradesh"],
            ["state" => "Uttarakhand"],
            ["state" => "West Bengal"]
        ];

        foreach ($states as $key => $state) {
            State::create($state);
        }
    }
}
