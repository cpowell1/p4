@extends('layouts.master')

@section('title')
    Search All Events
@endsection

@push('head')
    <link href='socialsetting.css' rel='stylesheet'>
@endpush

@section('content')
    <section class='mainContent'>
        <h2>Search All Events</h2>


        <form method='GET' action='/events/search-process'>


            <label for='searchTerm'>Search by Name:</label>
            <input type='text' name='searchTerm' id='searchTerm' value='{{ $searchTerm }}'>


            <input type='submit' value='Search' class='loginbtns'>

        </form>

        @if($searchTerm)
            <h2>Results for query: <em>{{ $searchTerm }}</em></h2>

            @if(count($searchResults) == 0)
                No matches found.
            @else
                @foreach($searchResults as $title => $event)
                    <div>
                        <h3>{{ $title }}</h3>
                        <h4>by {{ $event['event_name'] }}</h4>
                        <p>{{ $event['date'] }} </p>
                    </div>
                @endforeach
            @endif
        @endif


    </section>
@endsection