<?php

use Illuminate\Database\Seeder;
use App\Sheet;

class SheetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $sheets = [
            ['Birds', 1],
            ['Sunsets', 1],
            ['Cats', 2],
            ['Frogs', 2]
        ];

        $count = count($sheets);

        // day subtraction from class
        foreach ($sheets as $key => $sheetData) {
            $sheet = new Sheet();

            $sheet->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $sheet->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();

            $sheet->name = $sheetData[0];
            $sheet->user_id = $sheetData[1];

            $sheet->save();
            $count--;
        }
    }
}
