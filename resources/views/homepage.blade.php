@extends('layouts.master')

@section('title')
    Welcome to Social Setting | Nashville
@endsection

@push('head')
@endpush

@section('content')

    <section class='mainContent'>
        <img src='/images/pinewood.jpg' alt='Pinewood Social' class='img'/>
        <div id="homebuttons">
            <a href='/login'><button>Login</button></a>
            <a href='/events'><button>Browse What's Going On</button></a>
        </div>

        <div id='"topevent'>
            <h2>Events This Week</h2>
            @foreach($events as $event)
                <p>{{ $event->event_name }}</p>

            @endforeach
        </div>

    </section>
@endsection