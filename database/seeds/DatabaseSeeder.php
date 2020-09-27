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
        DB::table('users')->insert([
            'name'  => 'Admin',
            'email'     => 'luisreyes.apolo@gmail.com',
            'password'  => bcrypt('admin123'),
        ]);
    }
}
