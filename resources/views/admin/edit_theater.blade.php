@extends('master')

@section('title')
    Editar sala
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <form action="" method="post" accept-charset="utf-8">
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
                    <input class="form-control" type="text" id="name" name="name" value={{ $theater->name }}>
                </div>
                <div class="form-group">
                    <label for="rows" class="control-label">Filas</label>
                    <input class="form-control" type="number" id="rows" name="n_rows" value={{ $theater->n_rows }}>
                </div>
                <div class="form-group">
                    <label for="columns" class="control-label">Columnas</label>
                    <input class="form-control" type="number" id="columns" name="n_columns" value={{ $theater->n_columns }}>
                </div>
            </div>
        </div>
    </form>

@endsection
