<?php

use App\Models\Modality;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ModalityTableSeeder extends Seeder
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
                'name'  => 'Ponencia Oral',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'  => 'Asistentes',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'  => 'Semilleros',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'  => 'Evaluador',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        Modality::insert($data);
    }
}
