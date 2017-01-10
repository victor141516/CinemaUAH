<strong>Horarios:</strong>
@foreach ($film->projections as $projection)
	<a class="btn btn-sm btn-default" href="/seats/{{ $projection->id }}">{{ $projection->getBeginHour() }}</a>
@endforeach
