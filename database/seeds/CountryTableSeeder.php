<?php

use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CountryTableSeeder extends Seeder
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
                'name'  => 'Colombia',
                'name_short' => 'CO',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        Country::insert($data);
    }
}
