<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'evaluator']);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'chavarrocutiva2001@hotmail.com',
            'password' => bcrypt('admin123')
        ]);
        // Asignación del rol
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Admin',
            'email' => 'luisreyes.apolo@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        // Asignación del rol
        $user->assignRole('admin');

    }
}
