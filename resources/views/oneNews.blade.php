@extends('layouts.header')

<h1>{{$news->title}}</h1>
<p><img src="http://phpdev/storage/{{$news->image}}"/></p>
{!!$news->body!!}

<p>{{$news->created_at}}</p>

<h3>Коментарии</h3>
@foreach($comments as $thisComment)
	<h6>{{ $thisComment->created_at }}</h6>
	<p>{{ $thisComment->body }}</p>
@endforeach
<p>
	<a href="{{ route('index') }}">
		<button class="btn btn-warning">К списку новостей</button>
	</a>
</p>

@extends('layouts.footer')