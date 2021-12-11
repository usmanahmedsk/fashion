<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = json_decode(file_get_contents(storage_path() . "/data/locations/states.json"), true);
        State::insert($states);
    }
}
