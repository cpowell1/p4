@extends('layouts.master')

@section('title')
    Edit {{ $event->event_name}}
@endsection

@section('content')
<div class='container'>

    <h1>Edit {{ $event->event_name }}</h1>

    <form method='POST' action='/events/{{ $event->id }}' id='editform'>
        {{ method_field('put') }}
        {{ csrf_field() }}

        <label for='event_name'>Event Name</label>
        <input type='text' name='event_name' id='event_name' value='{{ old('event_name', $event->event_name) }}'>
        @include('modules.error-notice', ['field' => 'event_name'])


        <label for='date'>Date</label>
        <input type='text' name='date' id='date' value='{{ old('date', $event->date) }}'>
        @include('modules.error-notice', ['field' => 'date'])

        <label for='time'>Time</label>
        <input type='text'
               name='time'
               id='time'
               value='{{ old('time', $event->time) }}'>
        @include('modules.error-notice', ['field' => 'time'])


        <label for='location'>Location</label>
        <input type='text' name='location' id='location' value='{{ old('location', $event->location) }}'>
        @include('modules.error-notice', ['field' => 'location'])



        <label for='description'>Event Description</label>
        <textarea name='description' id='description' value='{{ old('description', $event->description) }}'>Write your description...</textarea>
        @include('modules.error-notice', ['field' => 'description'])

        <label for='event_url'>Event Website URL</label>
        <input type='text' name='event_url' id='event_url' value='{{ old('event_url') }}'>
        @include('modules.error-notice', ['field' => 'event_url'])

        <label>Event Category (Check All that Apply)</label>
        @foreach($categories as $categoryId => $catName)
            <ul>
                <li>
                    <label>
                        <input
                                {{ (in_array($categoryId, $category)) ? 'checked' : '' }}
                                type='checkbox'
                                name='categories[]'
                                value='{{ $categoryId }}'>
                        {{ $catName }}
                    </label>
                </li>
            </ul>
        @endforeach


        <input type='submit' value='Save Changes'>

        @if(count($errors) > 0)
            <div class='alert'>
                Please correct the errors above and try again.
            </div>
        @endif
    </form>
   </div>


@endsection