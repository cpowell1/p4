<div id='listing' class='clearfix'>
    <h2>{{ $event->event_name }}</h2>
    <h3>{{ $event->date }}</h3>
    <p>{{ $event->time }}</p>


<a href='/events/{{ $event->id }}'><button>Read More</button></a>

</div>


