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
            <div class="col-xs-12">
                <p class="bg-warning" style="padding: 15px; font-weight: 400;">
                    Aún no hay salas disponibles
                </p>
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
