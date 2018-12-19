@extends('layouts.master')

@section('title')
    {{ $event->event_name }}
@endsection

@section('content')
    <div id='contentPage'>
        <h1>{{ $event->event_name }}</h1>
        <p>{{ $event->when->format('M d, Y') }}</p>
        <p>{{ $event->when->format('g:ia') }}</p>
        <p>{{ $event->description }}</p>
        <p>{{ $event->event_url }}</p>
    </div>
    @if(count($event->categories) >= 1)
        <div id='categories'>
            <h3>Tags:</h3>

            @foreach($event->categories as $category)
                <span> {{ $category->type }}</span>

            @endforeach
            @endif

        </div>
@endsection



