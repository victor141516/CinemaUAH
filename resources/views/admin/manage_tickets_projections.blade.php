@extends('master')

@section('title')
    Proyecciones
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <div class="row">
        @foreach($theaters as $projections)
            <div class="col-sm-6 col-xs-12">
                <ul class="list-group">
                    <a class="list-group-item active" href="#" title="Editar proyección">{{ $projections->first()->theater->name }}</a>
                    @foreach($projections as $projection)
                        <a class="list-group-item" href="{{ url('admin/manage_tickets/' . $projection->id . '/select_seats') }}">
                            <strong>{{ $projection->film->name }}</strong> ({{ $projection->begin }})
                        </a>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

@endsection

