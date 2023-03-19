<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Division;
use Illuminate\Database\Seeder;
use File;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::truncate();

        $json = File::get("database/data/district.json");
        $divisions = json_decode($json);

        foreach ($divisions as $key => $value) {
            District::create([
                'division_id' => Division::where('division_id', $value->division_id)->first()->id,
                'district_id' => $value->id,
                'name' => $value->name,
                'bn_name' => $value->bn_name,
                'lat' => $value->lat,
                'long' => $value->long,
            ]);
        }
    }
}
