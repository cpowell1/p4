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


    public function search()
    {
        return view('events.search');
    }

    public function login()
    {
        return view('events.login');
    }



}
