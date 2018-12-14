<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Category;

class CategoryEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $events = [
            'Santa Rampage' => ['bars', 'food + drink', 'festivals'],
            'Ugly Christmas Sweaters Dog Edition' => ['pet-friendly', 'festivals', 'holiday'],
            'Make-A-Wish St. Jude Gala' => ['charity']
        ];

        foreach ($events as $type => $categories) {
            $event = Event::where('type', 'like', $type)->first();
            foreach ($categories as $categoriesType) {
                $category = Category::where('type', 'LIKE', $categoriesType)->first();

                $event->categories()->save($category);
            }
        }
    }
}
