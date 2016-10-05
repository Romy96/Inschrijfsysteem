@extends('menu')

@section('content')

	<h1>Events</h1>

	@foreach ( $events as $row ) 
	<div>
		<a href="event.php?id={{$row['events_id']}}">
	    	<div class='img' style='background-image:url({{$row['background_img']}})'>
			    <div class='img2'>
			    <p class='data_info'>{{$row['name']}}</p> 
			    <p class='data_info'>{{$row['start_date']}}</p>
			    <p class='data_info'>{{$row['location']}}</p> 
		    	</div>
	    	</div>
	    </a>
    </div>	
	@endforeach
	

@endsection