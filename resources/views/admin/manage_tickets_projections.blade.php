@extends('master')

@section('extra-css')
    <style type="text/css" media="screen">
        .film {
            min-height: 340px;
            display: flex;
        }
        .columna {
            flex-basis: 100%;
        }
    </style>
@endsection

@section('title')
    Películas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')
    <div class="jumbotron">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12" id="theater">
                <div class="row text-center" style="background-color: grey;">
                    <strong>Pantalla</strong>
                </div>
                @for ($i = 0; $i <= $theater->n_rows; $i++)
                    <div class="row fila" id="fila{{ $i }}">
                    @for ($j = 0; $j <= $theater->n_columns; $j++)
                        <div class="text-center columna" id="columna{{ $j }}"><img src=@if(in_array($i . '-' . $j, $seats))"/img/taken_seat.png"@else"/img/free_seat.png"@endif alt=""></div>
                    @endfor
                </div>
                @endfor
            </div>
        </div>
    </div>
@endsection

