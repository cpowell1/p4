@extends('layouts.master')

@section('title')
    Social Setting | Nashville
@endsection

@section('content')


    <section>
        <h2>Events</h2>
        @if($events->count() == 0)
            <p>You don't have any books yet; would you like to <a href='/events/create'>add one?</a></p>
        @else
            @foreach($events as $event)
                {{ $event->event_name }}
            @endforeach
        @endif
    </section>
@endsection