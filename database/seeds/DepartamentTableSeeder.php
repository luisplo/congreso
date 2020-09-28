<?php

use App\Models\Departament;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DepartamentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data =  [
            ['id' => '5', 'name' => 'Antioquia', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '8', 'name' => 'Atlántico', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '11', 'name' => 'Bogotá, D.C.', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '13', 'name' => 'Bolívar', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '15', 'name' => 'Boyacá', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '17', 'name' => 'Caldas', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '18', 'name' => 'Caquetá', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '19', 'name' => 'Cauca', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '20', 'name' => 'Cesar', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '23', 'name' => 'Córdoba', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '25', 'name' => 'Cundinamarca', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '27', 'name' => 'Chocó', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '41', 'name' => 'Huila', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '44', 'name' => 'La Guajira', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '47', 'name' => 'Magdalena', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '50', 'name' => 'Meta', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '52', 'name' => 'Nariño', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '54', 'name' => 'Norte De Santander', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '63', 'name' => 'Quindio', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '66', 'name' => 'Risaralda', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '68', 'name' => 'Santander', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '70', 'name' => 'Sucre', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '73', 'name' => 'Tolima', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '76', 'name' => 'Valle Del Cauca', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '81', 'name' => 'Arauca', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '85', 'name' => 'Casanare', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '86', 'name' => 'Putumayo', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '88', 'name' => 'Archipiélago De San Andrés, Providencia Y Santa Catalina', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '91', 'name' => 'Amazonas', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '94', 'name' => 'Guainía', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '95', 'name' => 'Guaviare', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '97', 'name' => 'Vaupés', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], ['id' => '99', 'name' => 'Vichada', 'country_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ];

        Departament::insert($data);
    }
}
