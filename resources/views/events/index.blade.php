@extends('layouts.master')

@section('title')
   All Events
@endsection

@push('head')
@endpush

@section('content')
    <section class='mainContent clearfix'>
        <h1>All Events</h1>
        <ul>
        @foreach($events as $event)
        @include('modules.listing')

        @endforeach
        </ul>
    </section>
@endsection