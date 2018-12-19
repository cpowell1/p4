<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Category;
use Carbon\Carbon;
use App\User;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_name')->get();

        return view('events.index')->with([
            'events' => $events
        ]);
    }

    public function show(Request $request, $id)
    {
        $event = Event::find($id);
        $categories = Category::all();

        return view('events.show')->with([
            'event' => $event,
            'categories' => $categories,
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
                if (strtolower($event->event_name) == strtolower($searchTerm)) {
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
        $categories = Category::categoryCheckbox();

        return view('events.create')->with([
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required',
            'when' => 'required',
            'location' => 'required',
            'description' => 'required',
            'event_url' => 'required',
        ]);

        $event = new Event();
        $event->event_name = $request->input('event_name');
        $event->when = $request->input('when');
        $event->location = $request->input('location');
        $event->description = $request->input('description');
        $event->event_url = $request->input('event_url');
        $event->user_id = $request->user()->id;
        $event->save();

        $event->categories()->sync($request->categories);

        return redirect('/events')->with([
            'alert' => 'Your event was created.'
        ]);
    }

    public function edit(Request $request, $id)
    {
        $event = Event::find($id);

        $categories = Category::categoryCheckbox();

        $catsforEvent = $event->categories->pluck('categories.id')->toArray();

        if ($event->user->id != $request->user()->id) {
            return redirect('/events')->with([
                'alert' => 'Access denied. You cannot edit events that you do not own.'
            ]);
        } else {
            return view('events.edit')
                ->with([
                    'event' => $event,
                    'categories' => $categories,
                    'catsforEvent' => $catsforEvent
                ]);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'event_name' => 'required',
            'when' => 'required',
            'location' => 'required',
            'description' => 'required',
            'event_url' => 'required',
        ]);

        $event = Event::find($id);

        $event->categories()->sync($request->categories);

        $event->event_name = $request->event_name;
        $event->when = $request->when;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->event_url = $request->event_url;
        $event->save();

        return redirect('/events/' . $id . '/edit')->with([
            'alert' => 'Your event was updated.'
        ]);
    }

    public function delete(Request $request, $id)
    {
        $event = Event::find($id);

        if ($event->user->id != $request->user()->id) {
            return redirect('/events')->with([
                'alert' => 'You cannot delete other users\' events.'
            ]);
        } else {
            return view('events.delete')->with([
                'event' => $event
            ]);
        }
    }

    public function destroy($id)
    {
        $event = Event::find($id);

        $event->categories()->detach();

        $event->delete();

        return redirect('/events')->with([
            'alert' => ' ' . $event->event_name . ' was removed.'
        ]);
    }

    public function account(Request $request)
    {
        $user = $request->user();
        $events = $user->events()->orderBy('event_name')->get();

        return view('events.useraccount')->with([
            'events' => $events,
        ]);
    }


}
