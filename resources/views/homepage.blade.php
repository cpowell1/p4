@extends('layouts.master')

@section('title')
    Welcome to Social Setting | Nashville
@endsection

@push('head')
@endpush

@section('content')

    <section class='mainContent'>
        <img src='/images/pinewood.jpg' alt='Pinewood Social' class='img'/>
        <div id="homebuttons">
            <a href='/events'>
                <button>Browse What's Going On</button>
            </a>
        </div>

    </section>
@endsection