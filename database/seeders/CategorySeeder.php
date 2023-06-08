<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Sport', 'News', 'Science', 'Web Development', 'UI/UX'];

        for($i = 0; $i < 5; $i++) {
            Category::factory()->create([
                'name' => $categories[$i],
                'slug' => Str::slug($categories[$i])
            ]);
        }
    }
}
