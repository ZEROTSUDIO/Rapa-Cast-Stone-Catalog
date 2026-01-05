<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin',
            'username' => 'Admin341',
            'email' => 'a.r.bayhaqi341@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('341201017J@h'),
            'remember_token' => Str::random(10)
        ]);
        User::factory(2)->create();
    }
}
