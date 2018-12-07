@extends('layouts.master')

@section('title')
    Edit {{ $event->event_name}}
@endsection

@section('content')

    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif

    <h1>Edit {{ $event->event_name }}</h1>

    <form method='POST' action='/events/{{ $event->id }}'>
        {{ method_field('put') }}
        {{ csrf_field() }}

        <label for='event_name'>Event Name</label>
        <input type='text' name='event_name' id='event_name' value='{{ old('event_name', $event->event_name) }}'>


        <label for='date'>Date</label>
        <input type='text' name='date' id='date' value='{{ old('date', $event->date) }}'>

        <label for='time'>Time</label>
        <input type='text'
               name='time'
               id='time'
               value='{{ old('time', $event->time) }}'>


        <label for='location'>Location</label>
        <input type='text' name='location' id='location' value='{{ old('location', $event->location) }}'>


        <label for='category'>Category</label>
        <select name='category'>
            <option value=''>Choose one...</option>
            @foreach($events as $event)
                <option value='{{ $event->category }}' {{ (old('category', $event->category) == $event->category) ? 'selected' : '' }}>{{ $event->category }}</option>
            @endforeach
        </select>



        <input type='submit' value='Save Changes'>
    </form>


@endsection