<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =  [
            [
                'name'  => 'Admin',
                'email'     => 'chavarrocutiva2001@hotmail.com',
                'password'  => bcrypt('admin123'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'name'  => 'Admin',
                'email'     => 'luisreyes.apolo@gmail.com',
                'password'  => bcrypt('admin123'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ]
        ];
        User::insert($data);
    }
}
