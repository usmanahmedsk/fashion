<?php

namespace Database\Seeders;

use App\Models\Influencer_store;
use Illuminate\Database\Seeder;

class InfluencerStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $influencer_stores = json_decode(file_get_contents(storage_path() . "/data/influencer_stores.json"), true);
        Influencer_store::insert($influencer_stores);
    }
}
