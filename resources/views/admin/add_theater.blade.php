@extends('master')

@section('title')
    Añadir sala
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

    <form action="add_film_submit" method="post" accept-charset="utf-8">
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
                    <input class="form-control" type="text" id="name">
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="rows" class="control-label">Filas</label>
                    <input class="form-control" type="number" id="rows" min="1" max="100">
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="columns" class="control-label">Columnas</label>
                    <input class="form-control" type="number" id="columns" min="1" max="100">
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
    <script type="text/javascript">
        $('#rows').on('input', () => {
            $('.fila').remove();
            $('#columns').val('');
            var nFilas = $('#rows').val();
            for (var i = 0; i < nFilas; i++) {
                $('#theater').append('<div class="row fila" id="fila' + i + '"></div>');
            }
        });
        $('#columns').on('input', () => {
            var nColumnas = $('#columns').val();
            $('.fila').each((index, el) => {
                console.log(el);
                for (var i = 0; i < nColumnas; i++) {
                    $('<div class="text-center columna" id="columna' + i + '"><img src="http://88.8.199.15:81/Imagenes/Libre_1.bmp" alt=""></div>').appendTo(el);
                }
            });
        });
    </script>
@endsection
