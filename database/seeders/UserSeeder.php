<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $users = collect(
            [
                [
                    "name" => "Sajan",
                    "email" => "sajan@gmail.com",
                    "mobile" => 7745991848,
                    "password" => Hash::make("sajan123"),
                ],
                [
                    "name" => "Manish",
                    "email" => "manish@gmail.com",
                    "mobile" => 7389817444,
                    "password" => Hash::make("manish!@#8426"),
                ]
            ]
        );

        $users->each(function ($user) {
            User::insert($user);
        });
    }
}
