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
            ['Winter Festival with Junior Chamber', '2018-12-19', '19:00:00', 'Cheekwood Gardens- Massey Hall', 'An event description goes here.', 'www.google.com'],
            ['Santa Rampage', '2018-12-18', '17:30:00', '4th & Broadway', 'An event description goes here.', 'www.google.com'],
            ['Porter Flea Market', '2018-12-20', '10:00:00', 'The Fairgrounds', 'An event description goes here.', 'www.google.com'],
            ['Ugly Christmas Sweaters Dog Edition', '2018-12-25', '12:00:00', 'The Farm at Natchez Trace', 'An event description goes here.', 'www.google.com'],
            ['Single All the Way Bar Crawl', '2018-12-26', '21:00:00', 'Tin Roof', 'An event description goes here.', 'www.google.com'],
            ['Make-A-Wish St. Jude Gala', '2018-12-29', '19:00:00', 'The Ryman Auditorium', 'An event description goes here.', 'www.google.com'],
        ];
        $count = count($events);
        foreach ($events as $key => $eventData) {
            $event = new Event();
            $event->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $event->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $event->event_name = $eventData[0];
            $timeObj = new Carbon\Carbon($eventData[1]. ' '.$eventData[2]);
            $event->when = $timeObj->toDateTimeString();
            $event->location = $eventData[3];
            $event->description = $eventData[4];
            $event->event_url = $eventData[5];
            $event->user_id = 1;
            $event->save();
            $count--;
        }
    }
}
