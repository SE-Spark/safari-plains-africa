<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'first_name' => 'Dev',
            'last_name' => 'Sun',
            'email' => 'devsun36@gmail.com',
            'phone' => '0718841608',
            'is_staff' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
