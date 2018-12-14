<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
        $categories = ['networking', 'food+drink', 'festivals', 'music', 'charity', 'holiday', 'bars', 'pet-friendly'];

        foreach ($categories as $typeCat) {
            $category = new Category();
            $category->type = $typeCat;
            $category->save();
        }
    }
}
