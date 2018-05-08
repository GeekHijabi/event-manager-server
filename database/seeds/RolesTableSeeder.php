<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('roles')->insert([
<<<<<<< HEAD
           'isAdmin' => true
=======
           'name' => 'admin'
>>>>>>> chore(Models and Migration): create models and migration file
       ]);
    }
}
