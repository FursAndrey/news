<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{asset('css/my.css')}}">
		<title>Laravel</title>
	</head>
	<body>
		<h1>{{$news->title}}</h1>
		<p><img src="http://phpdev/storage/{{$news->image}}"/></p>
		{{ html_entity_decode($news->body) }}
		<p>{{$news->created_at}}</p>
		
		<h3>Коментарии</h3>
		@foreach($comments as $thisComment)
			<p>{{ $thisComment->body }}</p>
		@endforeach
		<p>
			<a href="{{ route('index') }}">
				<button class="btn btn-warning">К списку новостей</button>
			</a>
		</p>
	</body>
</html>