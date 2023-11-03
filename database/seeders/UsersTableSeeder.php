<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'nathaly',
            'email' => 'nathaly@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'dui' => '0400000712',
            'edad'=>'22',
            'address' => 'Av. Universitaria',
            'phone' => '0968000009',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Paciente1',
            'email' => 'paciente1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'role' => 'paciente',
        ]);

        User::create([
            'name' => 'Medico 1',
            'email' => 'medico1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'role' => 'doctor',
        ]);

      
    }
}
