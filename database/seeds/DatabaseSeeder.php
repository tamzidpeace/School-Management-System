<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            ['role_id' => '1', 'name' => 'admin', 'email' => 'admin@lms.com', 'password' => bcrypt('11111111'), 'remember_token' =>  Str::random(10),],
            ['role_id' => '2', 'name' => 'teacher', 'email' => 'teacher@lms.com', 'password' => bcrypt('11111111'), 'remember_token' =>  Str::random(10),],
        ]);

        DB::table('roles')->insert([['name' => 'Teacher'], ['name' => 'Admin'],]);
    }
}
