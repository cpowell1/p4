<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class HomeController extends Controller
{
    public function __invoke()
    {
        $events = Event::orderBy('time')->get();
        return view('homepage')->with([
            'events' => $events
        ]);
    }
}
