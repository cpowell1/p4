<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function events()
    {
        return $this->belongsTo('App\Event');
    }

    public static function dump($events = null)
    {
        $data = [];
        # Determine if we should use $books as was passed to this method
        # or query for all books
        if (is_null($events)) {
            $events = self::all();
        }
        # Load the data array with the book info we want
        foreach ($events as $event) {
            $data[] = $event->event_name . ' on ' . $event->date . ' at ' . $event->time. ' at '. $event->location. ' This is a '. $event->category . 'type of event.';
        }
        dump($data);
    }
}
