@extends('master')

@section('title')
    Informe de salas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')
    <div class="row">
        @foreach($tickets as $ticket)
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <ul class="list-group">
                    <li class="list-group-item active"><strong>Fecha: </strong> {{ $ticket->date }}</li>
                    <li class="list-group-item">Se han vendido un total de <strong>{{ $ticket->n_ticket }}</strong> entradas</li>
                    <li class="list-group-item">Beneficios del día <strong>{{ $ticket->n_ticket * 5}}€</strong></li>
                </ul>
            </div>
        @endforeach
    </div>
@endsection
