@extends('layouts.header')

<h1>News</h1>
<table style="width:100%;">
	<thead>
		<tr style="background:#f8fafc">
			<th>
				Title
				<a href="{{ route('index', [1, 1]) }}">
					<button class="btn btn-warning">/\</button>
				</a>
				<a href="{{ route('index', [1, 2]) }}">
					<button class="btn btn-warning">\/</button>
				</a>
			</th>
			<th>Image</th>
			<th>
				Date
				<a href="{{ route('index', [2, 1]) }}">
					<button class="btn btn-warning">/\</button>
				</a>
				<a href="{{ route('index', [2, 2]) }}">
					<button class="btn btn-warning">\/</button>
				</a>
			</th>
		</tr>
	</thead>
	<tbody id="table-content">
	@foreach($news as $thisNews)
		<tr>
			<td>
				{{$thisNews->title}}
				<p>
					<a href="{{ route('showOneNews', $thisNews->slug) }}">
						<button class="btn btn-warning">Подробнее</button>
					</a>
				</p>
			</td>
			<td><img src="http://phpdev/storage/{{$thisNews->image}}"/></td>
			<td>
				{{$thisNews->created_at}}
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<p>
	@if ($prev_page != 0)
	<a href="{{ route('index', [$order, $line, $prev_page]) }}">
		<button class="btn btn-warning">Предыдущая страница</button>
	</a>
	@endif
	<button class="btn btn-warning">{{ $this_page }}</button>
	@if ($next_page != 0)
	<a href="{{ route('index', [$order, $line, $next_page]) }}">
		<button class="btn btn-warning">Следующая страница</button>
	</a>
	@endif
</p>

@extends('layouts.footer')