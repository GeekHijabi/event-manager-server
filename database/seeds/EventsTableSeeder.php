<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('events')->insert([
        'name' => str_random(10),
        'centre_id' => 1,
        'date' => Carbon::create('2018', '01', '01')
       ]);
    }
}
