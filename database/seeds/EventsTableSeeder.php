<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            ['Winter Festival with Junior Chamber', 'December 3, 2018', '6:30pm', 'Cheekwood Gardens- Massey Hall', 'Networking', 'An event description goes here.'],
            ['Santa Rampage', 'December 15th, 2018', '12pm', '4th & Broadway', 'Holiday', 'An event description goes here.'],
            ['Porter Flea Market', 'December 7th, 2018', '10am', 'The Fairgrounds', 'Festivals', 'An event description goes here.'],
            ['Ugly Christmas Sweaters Dog Edition', 'December 5th, 2018', '2pm', 'The Farm at Natchez Trace', 'Pet-Friendly', 'An event description goes here.'],
            ['Single All the Way Bar Crawl', 'December 21st, 2018', '5pm', 'Tin Roof', 'Drinking', 'An event description goes here.'],
            ['Make-A-Wish St. Jude Gala', 'December 14th, 2018', '7pm', 'The Ryman Auditorium', 'Charity', 'An event description goes here.'],
        ];

        $count = count($events);

        foreach ($events as $key => $eventData) {
            $event = new Event();

            $event->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $event->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $event->event_name = $eventData[0];
            $event->date = $eventData[1];
            $event->time = $eventData[2];
            $event->location = $eventData[3];
            $event->category = $eventData[4];
            $event->description = $eventData[5];

            $event->save();
            $count--;
        }
    }
}
