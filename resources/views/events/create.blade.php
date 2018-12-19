@extends('layouts.master')

@push('head')
@endpush

@section('title')
    Create Your Event
@endsection



@section('content')
    <h1>Create Your Event</h1>

    <form method='POST' action='/events'>

        {{ csrf_field() }}

        <label for='event_name'>Event Name</label>
        <input type='text' name='event_name' id='event_name' value='{{ old('event_name') }}'>
        @include('modules.error-notice', ['field' => 'event_name'])


        <label for='when'>Date and Time: (YYYY-MM-DD HH:MM:SS)</label>
        <input type='text' name='when' id='when' value='{{ old('when') }}'>
        @include('modules.error-notice', ['field' => 'when'])

        <label for='location'>Location</label>
        <input type='text' name='location' id='location' value='{{ old('location') }}'>
        @include('modules.error-notice', ['field' => 'location'])


        <label for='description'>Event Description</label>
        <input name='description' id='description'>
        @include('modules.error-notice', ['field' => 'description'])

        <label for='event_url'>Event Website URL</label>
        <input type='text' name='event_url' id='event_url' value='{{ old('event_url') }}'>
        @include('modules.error-notice', ['field' => 'event_url'])

        <label>Event Category (Check All that Apply)</label>


        <ul id='catCheck'>
            @foreach($categories as $categoryId => $categoryType)
                <div id='checkbox'>
                    <li><input {{ (in_array($categoryId, old('tags', []) )) ? 'checked' : '' }}
                    type='checkbox'
                                    name='tags[]'
                                    value='{{ $categoryId }}'></li>
                                    <label> {{ ucwords($categoryType) }}</label>
                </div>
            @endforeach
        </ul>


        <input type='submit' value='Add'>

        @if(count($errors) > 0)
            <div class='alert'>
                Please correct the errors above and try again.
            </div>
        @endif

    </form>


@endsection



