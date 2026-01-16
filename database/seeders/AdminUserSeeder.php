<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!env('ADMIN_EMAIL') || !env('ADMIN_PASSWORD') || !env('ADMIN_USERNAME') || !env('ADMIN_NAME')) {
            return;
        }
        User::firstOrCreate([
            'email' => env('ADMIN_EMAIL'),
            'name' => env('ADMIN_NAME'),
            'username' => env('ADMIN_USERNAME'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
        ]);
    }
}
