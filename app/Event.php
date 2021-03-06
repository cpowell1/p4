<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Event extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function weekTime() {

        $format = 'F j, Y g:ia';

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();



        # Query for events this week
        $events = Event::where('when', '>=', $startOfWeek)->where('when', '<=', $endOfWeek)->get();

        # Dump to the page so we can check our results

        foreach($events as $event) {
            dump($event->event_name.' on '.$event->when->format($format));
        }
    }

    protected $dates = [
        'when',
    ];

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
            $data[] = $event->event_name . ' on ' . $event->date . ' at ' . $event->time. ' at '. $event->location;
        }
        dump($data);
    }
}
