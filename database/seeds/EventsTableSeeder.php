<?php

use Illuminate\Database\Seeder;

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
            ['Winter Festival with Junior Chamber', 2018-11-30, '05:00:00', 'Cheekwood Gardens- Massey Hall', 'Networking'],
            ['Santa Rampage', 2018-12-15, '05:00:00', '4th & Broadway', 'Holiday'],
            ['Porter Flea Market', 2018-12-07, '05:00:00', 'The Fairgrounds', 'Festivals'],
            ['Ugly Christmas Sweaters Dog Edition', 2018-12-03, '05:00:00', 'The Farm at Natchez Trace', 'Pet-Friendly'],
            ['Single All the Way Bar Crawl', 2018-12-18, '05:00:00', 'Tin Roof', 'Drinking'],
            ['Make-A-Wish St. Jude Gala', 2018-12-21, '05:00:00', 'The Ryman Auditorium', 'Charity'],
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

            $event->save();
            $count--;
        }
    }
}
