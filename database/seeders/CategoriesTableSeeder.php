<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = [
            'Network Security',
            'Programming',
            'Information Systems',
            'Management',
            'Engineering',
            'Data Science',
            'Databases',
            'Administration',
            'AWS',
            'Business Management',
            'Computer Networking',
            'Cryptocurrency',
            'Data Security',
            'DevOps',
            'Microsoft',
            'Security',
            'Small Business',
        ];

        foreach($categories as $category)
        {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
