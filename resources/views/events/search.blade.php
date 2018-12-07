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

                <fieldset>
                    <label for='searchTerm'>Search by Name:</label>
                    <input type='text' name='searchTerm' id='searchTerm' value='{{ $searchTerm }}'>


                </fieldset>

                <input type='submit' value='Search'>

            </form>

            @if($searchTerm)
                <h2>Results for query: <em>{{ $searchTerm }}</em></h2>

                @if(count($searchResults) == 0)
            No matches found.
                @else
                    @foreach($searchResults as $title => $book)
                        <div >
                            <h3>{{ $events['event_name'] }}</h3>
                            <h4>{{ $events['date'] }}</h4>
                            <p>{{ $events['time'] }}</p>
                        </div>
                    @endforeach
                @endif
            @endif

    </section>
@endsection