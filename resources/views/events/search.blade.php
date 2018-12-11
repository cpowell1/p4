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
            <input type='text' name='searchTerm' id='searchTerm' value=''>


            <input type='submit' value='Search' class='loginbtns'>

        </form>


    </section>
@endsection