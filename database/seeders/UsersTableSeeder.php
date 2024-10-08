<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mohamed benkheira',
            'email' => '1rerain1@gmail.com',
            'password' => Hash::make('dashboardpassword'), // Use Hash::make() to hash the password
            'email_verified_at' => now(),
        ]);
    }
}
