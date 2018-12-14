@extends('layouts.master')

@section('title')
    Social Setting | Nashville
@endsection

@section('content')


    <section>
        <div id='userAccount'>
        <h1>Your Events</h1>

        @if($events->count() == 0)
            <p>You haven't added any events! Would you like to <a href='/events/create'>add one?</a></p>
        @else
            @foreach($events as $event)
            <div id='userEvents'>
                <h2>{{ $event->event_name }}</h2>
                <h3>{{ $event ->date }}</h3>
                <p>{{ $event->description }}</p>
                <a href='/events/{{ $event->id }}'><button>Read More</button></a>
                <div class='editdelete'>
                    <ul>
                        <li><a href='/events/{{ $event->id }}/edit'>Edit</a>
                        <li><a href='/events/{{ $event->id }}/delete'>Delete</a>
                    </ul>
                </div>
               </div>
            @endforeach
        @endif
            <div id='userBottom'>
            <a href='/events/create'><button>Add a New Event</button></a>
            <a href='/events'><button>Browse All Events</button></a>
            </div>
        </div>

        <a>
    </section>
@endsection