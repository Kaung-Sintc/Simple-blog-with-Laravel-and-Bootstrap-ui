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
            'name' => 'kgsint',
            'email' => 'kgsint@mail.co.uk',
            'password' => 'asdfghjkl',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Pann Phyu Sin',
            'email' => 'pannphyusin@mail.com',
            'password' => 'asdfghjkl',
        ]);

        User::factory(3)->create();
    }
}
