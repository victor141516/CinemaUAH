@extends('master')

@section('title')
    Películas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')
    @include('messages.error')
    @include('messages.warning')
    @include('messages.success')

    @if($films->count() == 0)
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="alert alert-warning">
                    <strong>¡Atención!</strong> Aún no hay películas disponibles, pulsa <a href="{{ url('admin/add_film') }}" title="crear película">aquí</a> para crear una.
                </div>
            </div>
        </div>
    @endif

    @include('common.film_list')

@endsection

