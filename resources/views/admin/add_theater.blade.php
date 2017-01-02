@extends('master')

@section('title')
    Añadir sala
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <form action="add_film_submit" method="post" accept-charset="utf-8">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12 col-md-offset-4">
                <div class="form-group">
                    <label for="name" class="control-label">Nombre</label>
                    <input class="form-control" type="text" id="name">
                </div>
                <div class="form-group">
                    <label for="rows" class="control-label">Filas</label>
                    <input class="form-control" type="number" id="rows">
                </div>
                <div class="form-group">
                    <label for="columns" class="control-label">Columnas</label>
                    <input class="form-control" type="number" id="columns">
                </div>
            </div>
        </div>
    </form>

@endsection
