<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "Abdelas Yoshia Elhawari",
                "email" => "elhawari1234@gmail.com",
                'password' => Hash::make('Password1'),
                'image' => "Foto_Abdelas.jpg",
                "role" => "Web Programmer",
            ]
        ];

        DB::table('users')->insert($data);

    }
}
