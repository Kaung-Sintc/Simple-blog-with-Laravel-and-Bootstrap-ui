<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'password' => 'asdfghjkl'
        ]);

        User::factory()->create([
            'name' => 'pannphyusin',
            'email' => 'pannphyusin@mail.com',
            'password' => 'asdfghjkl'
        ]);
    }
}
