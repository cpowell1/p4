@extends('layouts.master')

@push('head')

@endpush

@section('title')
    Confirm deletion: {{ $event->event_name }}
@endsection

@section('content')
    <div class='mainContent'>
        <h1>Confirm deletion</h1>

        <p>Are you sure you want to delete <strong>{{ $event->event_name }}</strong>?</p>


        <form method='POST' action='/events/{{ $event->id }}'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <input type='submit' value='Delete'>
        </form>


        <a href='/events/{{ $event->id }}' class='loginbtns'>
            <button>Nevermind, keep partying.</button>
        </a>
    </div>


@endsection