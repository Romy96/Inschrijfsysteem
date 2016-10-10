@extends('layout')

@section('content')

	@foreach ( $event as $row )
		<div class='banner' style='background-image:url({{$row['banner']}})'>	
			<h1 class='title'>{{$row['name']}}</h1>
		</div>
	@endforeach

	@foreach ( $activities as $rows ) 
	<div>
	    <div class='img' style='background-image:url({{$rows['image']}})'>
		    <div class='img2'>
		    <p class='data_info'>{{$rows['name']}}</p> 
		    <p class='data_info'>{{$rows['description']}}</p>
		    </div>
	    </div>
    </div>	
	@endforeach
	

@endsection