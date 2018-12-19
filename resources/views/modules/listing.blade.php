<div id='listing' class='clearfix'>
    <h2>{{ $event->event_name }}</h2>
    <h3>{{ $event->when->format('M d, Y') }}</h3>
    <h3>{{ $event->when->format('g:ia') }}</h3>
    <h3> {{ $event->location }} </h3>


<a href='/events/{{ $event->id }}'><button>Read More</button></a>

</div>


