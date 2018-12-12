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
            ['Winter Festival with Junior Chamber', 'December 3, 2018', '6:30pm', 'Cheekwood Gardens- Massey Hall', 'An event description goes here.'],
            ['Santa Rampage', 'December 15th, 2018', '12pm', '4th & Broadway', 'An event description goes here.'],
            ['Porter Flea Market', 'December 7th, 2018', '10am', 'The Fairgrounds', 'An event description goes here.'],
            ['Ugly Christmas Sweaters Dog Edition', 'December 5th, 2018', '2pm', 'The Farm at Natchez Trace', 'An event description goes here.'],
            ['Single All the Way Bar Crawl', 'December 21st, 2018', '5pm', 'Tin Roof', 'An event description goes here.'],
            ['Make-A-Wish St. Jude Gala', 'December 14th, 2018', '7pm', 'The Ryman Auditorium', 'An event description goes here.'],
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
            $event->description = $eventData[4];
            $event->save();
            $count--;
        }
    }
}
