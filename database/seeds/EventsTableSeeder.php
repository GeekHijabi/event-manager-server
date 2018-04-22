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
        'booked_from' => str_random(10),
        'venue' => str_random(10),
        'event_name' => str_random(10),
        'event_date' => Carbon::create('2018', '01', '01')
       ]);
    }
}
