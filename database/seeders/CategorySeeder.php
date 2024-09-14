<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =
        [
            'PHP',
            'C++',
            'Python',
            'HTML - CSS',
            'Devops',
            'Q/A',
            'Java',
            'JavaScript',
            'Devops'
        ];

        foreach($categories as $category)
        {
            Category::create([
                'name' => $category,
            ]);
        }

    }
}
