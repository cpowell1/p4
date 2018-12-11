@extends('layouts.master')

@section('title')
    {{ $event->event_name }}
@endsection

@section('content')
        <div id='contentPage'>
            <h1>{{ $event->event_name }}</h1>
            <p>{{ $event->date }}</p>
            <p>{{ $event->time }}</p>
            <p>{{ $event->description }}</p>


            <ul class='eventActions'>
                <li><a href='/events/{{ $event->id }}/edit'>Edit</a>
                <li><a href='/events/{{ $event->id }}/delete'>Delete</a>
            </ul>
        </div>
@endsection



