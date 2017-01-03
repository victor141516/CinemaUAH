@extends('master')

@section('title')
    Editar sala ({{ $theater->name }})
@endsection

@section('extra-css')
    <style type="text/css" media="screen">
        .fila {
            display: flex;
        }
        .columna {
            flex-basis: 100%;
        }
    </style>
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
            <div class="col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="name" class="control-label">Nombre</label>
                    <input class="form-control" type="text" id="name" value="{{ $theater->name }}">
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="rows" class="control-label">Filas</label>
                    <input class="form-control" type="number" id="rows" min="1" max="100" value="{{ $theater->rows }}">
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="columns" class="control-label">Columnas</label>
                    <input class="form-control" type="number" id="columns" min="1" max="100" value="{{ $theater->columns }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12" id="theater">
                <div class="row text-center" style="background-color: grey;">
                    <strong>Pantalla</strong>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('extra-js')
    <script type="text/javascript" src="js/display-seats.js"></script>
@endsection
