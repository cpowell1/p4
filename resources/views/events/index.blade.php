@extends('layouts.master')

@section('title')
    All Events
@endsection

@push('head')
@endpush

@section('content')
    <section id='allEvents'>
        <h2>All Events</h2>
        @foreach($events as $event)
        @endforeach
    </section>
@endsection