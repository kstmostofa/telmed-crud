<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;
use File;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::truncate();

        $json = File::get("database/data/division.json");
        $divisions = json_decode($json);

        foreach ($divisions as $key => $value) {
            Division::create([
                'division_id' => $value->id,
                'name' => $value->name,
                'bn_name' => $value->bn_name,
                'lat' => $value->lat,
                'long' => $value->long,
            ]);
        }
    }
}
