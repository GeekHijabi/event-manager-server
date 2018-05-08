<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
<<<<<<< HEAD
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'username' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' =>Hash::make('thislife')
=======
            'first_name' => 'admin',
            'role_id' => 1,
            'last_name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>Hash::make('admin123')
>>>>>>> chore(Models and Migration): create models and migration file
        ]);
    }
}
