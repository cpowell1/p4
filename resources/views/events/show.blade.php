@extends('layouts.master')

@section('title')
    {{ $event->event_name }}
@endsection

@push('head')
@endpush

@section('content')
    <h1>{{ $event->event_name }}</h1>

    <div>
        <h2> {{ $event->event_name }} </h2>
        <p>By {{ $event->date }}</p>
        <p>Added {{ $event->time }} </p>


        <ul class='eventActions'>
            <li><a href='/events/{{ $event->id }}/edit'>Edit</a>
            <li><a href='/events/{{ $event->id }}/delete'>Delete</a>
        </ul>
    </div>
@endsection



