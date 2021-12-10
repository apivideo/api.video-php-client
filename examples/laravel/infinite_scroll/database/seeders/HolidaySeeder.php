<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Model\Holiday;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Holiday::truncate();

        $csvFile = fopen(base_path("database/data/holiday.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Holiday::create([
                    "Title" => $data['0'],
                    "Video_ID" => $data['1'],
                    "MP4_Link" => $data['2']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
