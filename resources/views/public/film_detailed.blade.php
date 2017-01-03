@extends('master')

@section('extra-css')
    <style type="text/css" media="screen">
        .jumbotron p {
            font-size: 16px;
        }
    </style>
@endsection

@section('title')
    {{ $film->name }}
@endsection

@section('navbar')
    @include('public.common.navigation')
@endsection

@section('content')

    <div class="jumbotron">
        <div class="row" style="padding-bottom: 15px;">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a href="#" class="btn btn-primary">Consultar horarios</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-xs-12 col-md-offset-1">
                <h3>{{ $film->name }}</h3>
                <p>
                    <strong>Título original: </strong>
                    {{ $film->original_title }}
                </p>
                <p>
                    <strong>Director: </strong>
                    {{ $film->director }}
                </p>
                <p>
                    <strong>Sinopsis: </strong>
                    {{ $film->synopsis }}
                </p>
                <p>
                    <strong>Página Web: </strong>
                    {{ $film->website }}
                </p>
                <p>
                    <strong>País: </strong>
                    {{ $film->country }}
                </p>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <strong>Duración:</strong> {{ $film->minutes_duration }} mins / <strong>Género:</strong> {{ $film->genre }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <img src=@if($film->has_image) "/img/{{ $film->id }}.jpg" @else "/img/default.jpg" @endif alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron">
        <div class="row">
            <div class="col-xs-12">
                <h4>Opiniones de Usuarios</h4>
            </div>
        </div>

        @if(count($comments) == 0)
            <div class="row">
                <div class="col-xs-12">
                    <p class="bg-warning" style="padding: 15px; font-weight: 400;">
                        Aún no tenemos comentarios para esta película, añade el tuyo :)
                    </p>
                </div>
            </div>
        @endif

        @foreach($comments as $comment)
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Opinion 1 por /*nombredeusuario*/
                        </div>
                        <div class="panel-body">
                            <p>Blabla</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col-xs-12">
                <form action="film_detailed_submit" method="post" accept-charset="utf-8">
                    <div class="form-group">
                        <label for="comment" class="control-label">Comentario</label>
                        <textarea class="form-control" rows="3" id="comment" name="comment"></textarea>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Añadir comentario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

