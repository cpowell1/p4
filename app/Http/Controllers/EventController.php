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

    public function search(Request $request)
    {
        return view('events.search');
    }

    public function searchProcess(Request $request)
    {
    }

    public function login()
    {
        return view('events.login');
    }

    /**
     * GET /books/create
     * Display the form to add a new book
     */
    public function create(Request $request)
    {
        return view('events.create');
    }

    /**
     * POST /books
     * Process the form for adding a new book
     */
    public function store(Request $request)
    {
    }

    public function edit($id)
    {
        return view('events.edit');
    }

    /*
    * PUT /books/{id}
    */
    public function update(Request $request)
    {
    }

    /*
   * Asks user to confirm they actually want to delete the book
   * GET /books/{id}/delete
   */
    public function delete()
    {
        return view('events.delete');
    }

    /*
    * Actually deletes the book
    * DELETE /books/{id}/delete
    */
    public function destroy()
    {
    }
}
