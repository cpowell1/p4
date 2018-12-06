@extends('layouts.master')

@section('title')
    {{ $event->event_name }}
@endsection

@push('head')
@endpush
@section('content')

    <h1>{{ $event->event_name }}</h1>



        <p>Added {{ $event->created_at->format('m/d/y') }}</p>


    <div>
        <ul>
            <li><a href='{{ $event->event_name }}'><i class="fas fa-shopping-cart"></i> Purchase</a>
            <li><a href='/events/{{ $event->date }}/edit'><i class="fas fa-pencil-alt"></i> Edit</a>
            <li><a href='/events/{{ $event->time }}/delete'><i class="fas fa-trash-alt"></i> Delete</a>
        </ul>
    </div>
@endsection
