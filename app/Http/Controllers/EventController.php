<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('time')->get();

        return view('events.index')->with([
            'events' => $events
        ]);
    }

    public function show(Request $request, $id)
    {
        $event = Event::find($id);

        return view('events.show')->with([
            'event' => $event
        ]);
    }

    public function search(Request $request)
    {
        return view('events.search')->with([
            'searchTerm' => session('searchTerm', ''),
            'searchResults' => session('searchResults', []),
        ]);
    }

    public function searchProcess(Request $request)
    {
        $searchResults = [];
        $searchTerm = $request->input('searchTerm', null);
        $events = Event::all();

            if ($searchTerm) {
                foreach ($events as $event) {
                    if($event->event_name == $searchTerm) {
                        {
                            $searchResults[] = $event;
                        }
                    }
                }
            }


        return redirect('/events/search')->with([
            'searchTerm' => $searchTerm,
            'searchResults' => $searchResults,

        ]);

    }



    public function create(Request $request)
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'description' => ' ',
        ]);

        $event = new Event();
        $event->event_name = $request->input('event_name');
        $event->date = $request->input('date');
        $event->time = $request->input('time');
        $event->location = $request->input('location');
        $event->description = $request->input('description');
        $event->user_id = $request->user()->id;
        $event->save();

        return redirect('/events')->with([
            'alert' => 'Your event was added.'
        ]);
    }

    public function edit($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return redirect('/events')->with([
                'alert' => 'Event not found.'
            ]);
        }

        return view('events.edit')->with([
            'event' => $event
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'event_name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);
        $event = Event::find($id);
        $event->event_name = $request->event_name;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->save();

        return redirect('/events/' . $id . '/edit')->with([
            'alert' => 'Your changes were saved.'
        ]);
    }

    public function delete($id)
    {
        $event = Event::find($id);
        if (!$event) {
            return redirect('/events')->with('alert', 'Event not found');
        }

        return view('events.delete')->with([
            'event' => $event,
        ]);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/events')->with([
            'alert' => '“' . $event->event_name . '” was removed.'
        ]);
    }

    public function account(Request $request) {
        $user = $request->user();

        $events = $user->events()->orderBy('title')->get();
        return view('events.useraccount')->with([
            'events' => $events,
        ]);
    }
}
