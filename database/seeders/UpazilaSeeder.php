<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Upazila;
use Illuminate\Database\Seeder;
use File;

class UpazilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Upazila::truncate();

        $json = File::get("database/data/upazila.json");
        $upazilas = json_decode($json);

        foreach ($upazilas as $key => $value) {
            Upazila::create([
                'district_id' => District::where('district_id', $value->district_id)->first()->id,
                'upazila_id' => $value->id,
                'name' => $value->name,
                'bn_name' => $value->bn_name,
            ]);
        }
    }
}
