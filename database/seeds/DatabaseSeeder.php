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
        //$this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            ['role_id' => '1', 'name' => 'admin', 'email' => 'admin@lms.com', 'password' => bcrypt('11111111'), 'remember_token' =>  Str::random(10),],
            ['role_id' => '2', 'name' => 'teacher', 'email' => 'teacher@lms.com', 'password' => bcrypt('11111111'), 'remember_token' =>  Str::random(10),],
        ]);

        DB::table('roles')->insert([
        ['name' => 'Teacher'], 
        ['name' => 'Admin'],
        ['name' => 'Staff'],
        ['name' => 'accountant'],
        ]);

        DB::table('days')->insert([
            ['day' => 'Satarday'],
            ['day' => 'Sunday'],
            ['day' => 'Monday'],
            ['day' => 'Tuesday'],
            ['day' => 'Wednesday'],
            ['day' => 'Thusday'],
            ['day' => 'Friday'],
        ]);

        // DB::table('periods')->insert([
        //     ['name' => 'Period 1'],
        //     ['name' => 'Period 2'],
        //     ['name' => 'Period 3'],
        //     ['name' => 'Period 4'],
        //     ['name' => 'Period 5'],
        //     ['name' => 'Period 6'],
        //     ['name' => 'Period 7'],
        // ]);

        DB::table('school_classes')->insert([
            ['name' => 'One'],
            ['name' => 'Two'],
            ['name' => 'Three'],
            ['name' => 'Four'],
            ['name' => 'Five'],
            ['name' => 'Six'],
            ['name' => 'Seven'],
        ]);
    }
}
