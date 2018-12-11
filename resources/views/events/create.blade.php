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


        <label for='date'>Date</label>
        <input type='text' name='date' id='date' value='{{ old('date') }}'>
        @include('modules.error-notice', ['field' => 'date'])

        <label for='time'>Time</label>
        <input type='text'
               name='time'
               id='time'
               value='{{ old('time') }}'>
        @include('modules.error-notice', ['field' => 'time'])


        <label for='location'>Location</label>
        <input type='text' name='location' id='location' value='{{ old('location') }}'>
        @include('modules.error-notice', ['field' => 'location'])



        <label for='description'>Event Description</label>
        <textarea name='description' id='description'>Write your description</textarea>
        @include('modules.error-notice', ['field' => 'description'])



        <input type='submit' value='Add'>

        @if(count($errors) > 0)
            <div class='alert'>
                Please correct the errors above and try again.
            </div>
        @endif

    </form>


@endsection



