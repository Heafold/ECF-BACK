<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $category =  Category::factory(3)->create();

        $color = Color::factory(3)->create();

        for ($i = 0; $i < 20; $i++){
         Product::factory()->create(['category_id' => $category->random(), 'color_id' => $color->random()]);
        }

    }
}
