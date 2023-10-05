<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = collect(
            [
                [
                    "name" => "Nargish",
                    "email" => "nargish.gupta@gmail.com",
                    "password" => Hash::make("nargish!@#8426"),
                ],
            ]
        );

        $admins->each(function ($user) {
            Admin::insert($user);
        });
    }
}
