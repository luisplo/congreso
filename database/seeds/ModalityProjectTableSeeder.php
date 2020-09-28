<?php

use App\Models\ModalityProject;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ModalityProjectTableSeeder extends Seeder
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
                'name'  => 'En curso',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'  => 'Finalizado',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        ModalityProject::insert($data);
    }
}
