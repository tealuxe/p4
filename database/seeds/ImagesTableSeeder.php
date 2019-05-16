<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        // UPDATE FOR IMAGES
        $sheets = [
            ['Nature', 1],
            ['Yale', 2],
            ['Bird', 2]
        ];

        $count = count($sheets);

        foreach ($sheets as $key => $sheetData) {
            $sheet = new Sheet();

            $sheet->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $sheet->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();

            $sheet->name = $sheetData[0];
            $sheet->sheet_id = $sheetData[1];

            $sheet->save();
            $count--;
        }
    }
}
