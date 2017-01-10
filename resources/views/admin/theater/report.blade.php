@extends('master')

@section('title')
    Informe de salas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')
    <div class="row">
        @foreach($theaters as $theater)
            <div class="col-xs-12 col-sm-4">
                <ul class="list-group">
                    <li class="list-group-item active"><strong>{{ $theater->name }}</strong></li>
                    <li class="list-group-item">Porcentaje de uso de la sala {{ number_format($theater->getTheaterUsageOfFilm() * 100, 2) }}%</li>
                </ul>
            </div>
        @endforeach
    </div>
@endsection
