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
<<<<<<< HEAD
            'user_id' => 1,
=======
>>>>>>> chore(Models and Migration): create models and migration file
            'centre_name' => str_random(15),
            'location' => str_random(25),
            'isAvailable' => True,
        ]);
    }
}
