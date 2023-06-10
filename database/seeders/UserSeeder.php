<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'asdfghjkl',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => 'asdfghjkl',
        ]);

        User::factory()->create([
            'name' => 'Sarah',
            'email' => 'sarah@gmail.com',
            'password' => 'asdfghjkl',
        ]);

        User::factory(3)->create();
    }
}
