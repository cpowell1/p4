<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;


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
        return view('events.search');
    }

   ## public function searchProcess(Request $request)
   ##{
   ##}

    public function login()
    {
        return view('events.login');
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
            'time' => 'required|digits:4',
            'location' => 'required|url',
            'category' => 'required|url'
        ]);

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->location = $request->location;
        $event->category = $request->category;
        $event->save();

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
            'category' => 'required',
        ]);
        $event = Event::find($id);
        $event->event_name = $request->event_name;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->category= $request->category;
        $event->location = $request->category;
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
}
