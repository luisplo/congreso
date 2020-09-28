<?php

use App\Models\TypeDocument;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TypeDocuTableSeeder extends Seeder
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
                'name' => 'Cedula De Ciudadania',
                'name_short' => 'CC',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                
            ],
            [
                'name' => 'Cedula De Extranjeria',
                'name_short' => 'CE',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Numero De Identificacion Personal',
                'name_short' => 'NIP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Numero De Identificacion Tributaria',
                'name_short' => 'NIT',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Tarjeta De Identidad',
                'name_short' => 'TI',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Pasaporte',
                'name_short' => 'PAP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        TypeDocument::insert($data);
    }
}
