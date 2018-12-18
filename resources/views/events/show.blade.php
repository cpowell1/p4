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
        <p>{{ $event->event_url }}</p>

        <div id='categories'>
        @foreach($event->categories as $category)
            <span>{{ $category->type }}</span>
        @endforeach
        </div>
    </div>
@endsection



