@extends('master')

@section('title')
    Informe de entradas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    @if($tickets->count() == 0)
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="alert alert-warning">
                    <strong>¡Atención!</strong> No se han encontrado informes aún.
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        @foreach($tickets as $ticket)
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <ul class="list-group">
                    <li class="list-group-item active"><strong>Fecha: </strong> {{ $ticket->date }}</li>
                    <li class="list-group-item">Se han vendido un total de <strong>{{ $ticket->n_tickets }}</strong> entradas</li>
                    <li class="list-group-item">Beneficios del día <strong>{{ $ticket->n_tickets * 5}}€</strong></li>
                </ul>
            </div>
        @endforeach
    </div>
@endsection
