<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;
use File;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speciality::truncate();

        $json = File::get("database/data/speciality.json");
        $divisions = json_decode($json);

        foreach ($divisions as $key => $value) {
            Speciality::create([
                'name' => $value->speciality,
            ]);
        }
    }
}
