<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class KeynotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . "/json/keynotes.json";
        $json = json_decode(file_get_contents($path), true);
        $length = count($json);
        for ($i = 1; $i <= $length; $i++) {
            $key = 'keynote-' . $i;
            DB::table('keynotes')->insert([
                'keynote_id' => $json[$key]['index'],
                'date' => $json[$key]['date'],
                'start_time' => $json[$key]['start_time'],
                'end_time' => $json[$key]['end_time'],
                'agenda' => $json[$key]['agenda'],
                'speaker' => $json[$key]['speaker'],
                'position' => $json[$key]['position'],
                'food' => $json[$key]['food']
            ]);
        }
    }
}
