<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Category;

class CategoryEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $events = [
            'Porter Flea Market' => ['festivals', 'food+drink',                    'pet-friendly'],
            'Single All the Way Bar Crawl' => ['bars', 'holiday',                   'music'],
            'Make-A-Wish St. Jude Gala' => ['charity', 'holiday',                   'music']
        ];

        foreach ($events as $event_name => $categories) {
            $event = Event::where('event_name', 'like', $event_name)->first();

            foreach ($categories as $catType) {
                $category = Category::where('type', 'LIKE', $catType)->first();

                $event->categories()->save($category);
            }
        }
    }
}
