<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CentresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('centres')->insert([
            'user_id' => 1,
            'location' => str_random(25),
            'isAvailable' => True,
            'capacity' => 100,
            'facilities' => json_encode(
                [
                    'projector' => '1',
                    'washroom' => '1',
                    'chairs' => '50'
                ]
            )
        ]);
    }
}
