<?php

use App\Models\Calendar;
use App\Models\Carousel;
use App\Models\MainTheme;
use App\Models\Modality;
use App\Models\ModalityProject;
use App\Models\Register;
use App\Models\Speaker;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Calendar::truncate();
        Carousel::truncate();
        MainTheme::truncate();
        Modality::truncate();
        ModalityProject::truncate();
        Register::truncate();
        Speaker::truncate();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        //CREATE TABLE
        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');
        $this->call('CountryTableSeeder');
        $this->command->info('Country table seeded!');
        $this->call('DepartamentTableSeeder');
        $this->command->info('Departament table seeded!');
        $this->call('CityTableSeeder');
        $this->command->info('City table seeded!');
        $this->call('TypeDocuTableSeeder');
        $this->command->info('Type Document table seeded!');
        $this->call('ModalityTableSeeder');
        $this->command->info('Modality Document table seeded!');
        $this->call('ModalityProjectTableSeeder');
        $this->command->info('Modality Project Document table seeded!');
        $this->call('MainThemeTableSeeder');
        $this->command->info('Main Theme Document table seeded!');
    }
}
