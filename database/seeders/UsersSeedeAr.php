<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeedeAr extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Users')->insert([
            [
                "name" => "coba-coba",
                'email' => 'coba@gmail.com',
                'email_verified_at' => '',
                "password" => 'coba-coba',
                "remember_token" => "",
            ],
        ]);
    }
}
