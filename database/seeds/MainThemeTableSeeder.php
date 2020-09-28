<?php

use App\Models\MainTheme;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MainThemeTableSeeder extends Seeder
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
                'name'  => 'Agrícola',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'  => 'Acuícola',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'  => 'Agroindustrial',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'  => 'Pecuario',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        MainTheme::insert($data);
    }
}
