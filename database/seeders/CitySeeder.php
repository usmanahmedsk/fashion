<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = json_decode(file_get_contents(storage_path() . "/data/locations/cities.json"), true);
        $citiesChunck = array_chunk($cities, 1000);
        for ($i = 0; $i < (int)ceil(count($cities) / 1000); $i++) {
            City::insert($citiesChunck[$i]);
        }
    }
}
