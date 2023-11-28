<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'lorenfe.cuadero@student.passerellesnumeriques.org',
                'password' => bcrypt('Adminpassword'),
                'email_verified_at' => now(),
                'role' => '2',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'staff',
                'email' => '21103903@usc.edu.ph',
                'password' => bcrypt('Staffpassword'),
                'email_verified_at' => now(),
                'role' => '1',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'student',
                'email' => 'lorencuadero8@gmail.com',
                'password' => bcrypt('Studentpassword'),
                'email_verified_at' => now(),
                'role' => '0',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}