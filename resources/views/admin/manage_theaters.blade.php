@extends('master')

@section('title')
    Administrar salas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    @if($theaters->count() == 0)
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="alert alert-warning">
                    <strong>¡Atención!</strong> Aún no hay salas disponibles, pulsa <a href="{{ url('admin/add_theater') }}" title="crear sala">aquí</a> para crear una.
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        @foreach($theaters as $theater)
            <div class="col-md-1 col-sm-3 col-xs-12 text-center">
                <a href="{{ url('admin/edit_theater/'. $theater->id) }}" title="Editar sala">{{ $theater->name }}</a>
            </div>
        @endforeach
    </div>
@endsection
