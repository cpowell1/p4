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

    public function search()
    {
        return view('events.search');
    }

    public function login()
    {
        return view('events.login');
    }



}