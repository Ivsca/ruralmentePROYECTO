<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'document'=>'123456789',
            'documentType'=>'cc',
            'name' => 'Jhoel',
            'lastName' => 'cuervo lopez',
            'sex' => 'masculino',
            'birthDate' => '29/01/2002',
            'phone' => '12345678',
            'country' => 'Colombia',
            'department' => 'Antioquia',
            'city' => 'medellin',
            'address' => 'cnjnjdcnksdjcn',
            'email' => 'prueba@prueba.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'), // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => 1,
            'profile_photo_path' => null,
            'current_team_id' => null,
        ])->assignRole('Admin');
        // User::create([
        //     'name' => 'Emanuel',
        //     'email' => 'ema@ema.com',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('123456789'), // password
        //     'two_factor_secret' => null,
        //     'two_factor_recovery_codes' => null,
        //     'remember_token' => 1,
        //     'profile_photo_path' => null,
        //     'current_team_id' => null,
        // ]);
        // \App\Models\User::factory(0)->create();
    }
}
