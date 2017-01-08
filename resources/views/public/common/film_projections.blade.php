@foreach ($film->projections as $projection)
	<a href="/seats/{{ $projection->id }}">{{ $projection->getBeginHour() }}</a>
@endforeach