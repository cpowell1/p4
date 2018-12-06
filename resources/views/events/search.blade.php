@extends('layouts.master')

@section('title')
   Search All Events
@endsection

@push('head')
@endpush

@section('content')
    @include('modules.nav')
    <section id='allEvents'>
        <h2>Search All Events</h2>
        @foreach($events as $event)
        @endforeach
    </section>
@endsection