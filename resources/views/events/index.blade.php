@extends('layouts.master')

@section('title')
    All Events
@endsection

@push('head')
@endpush

@section('content')
    <section class='mainContent clearfix'>
        <h2>All Events</h2>
        <ul>
        @foreach($events as $event)
        @include('modules.listing')
        @endforeach
        </ul>
    </section>
@endsection