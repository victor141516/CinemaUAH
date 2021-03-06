@extends('master')

@section('extra-css')
    <style type="text/css" media="screen">
        .jumbotron p {
            font-size: 16px;
        }
    </style>
@endsection

@section('title')
    {{ $film->name }} ({{ $film->year }})
@endsection

@section('navbar')
    @include('public.common.navigation')
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h3>{{ $film->name }} <span>({{ $film->year }})</span></h3>
        </div>
        <div class="col-xs-12" style="font-style: italic;">
            {{ $film->original_title }} (título original)
        </div>
        <div class="col-xs-12">
            {{ $film->age_rating }} | {{ $film->minutes_duration }} mins. | {{ $film->genre }}
        </div>
    </div>
    <div class="row" style="padding-top: 15px;">
        <div class="col-sm-4 col-xs-12 text-center">
            <img src=@if($film->has_image) "/img/films/{{ $film->id }}.jpg" @else "/img/default.jpg" @endif alt="{{ $film->name }}">
        </div>
        <div class="col-sm-8 col-xs-12">
            <p>
                <strong>Sinopsis: </strong>
                {{ $film->synopsis }}
            </p>
            <p>
                <strong>Director: </strong>
                {{ $film->director }}
            </p>
            <p>
                <strong>Productor: </strong>
                {{ $film->producer }}
            </p>
            <p>
                <strong>Navionalidad: </strong>
                {{ $film->country }}
            </p>
            <p>
                <a href="{{ $film->website }}" title="{{ $film->name }}"><strong>Página Web</strong></a>
            </p>
            @if($film->others != '')
                <p>
                    <strong>Otros: </strong>
                    {{ $film->others }}
                </p>
            @endif
            <p>
                @include('public.common.film_projections')
            </p>
        </div>
    </div>
    <div class="row" style="padding-top: 15px;">
        <div class="col-xs-12">
            <h4>Opiniones de Usuarios</h4>
        </div>
    </div>

    @if(count($film->comments) == 0 && Auth::check())
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="alert alert-warning">
                    Aún no tenemos comentarios para esta película, añade el tuyo :)
                </div>
            </div>
        </div>
    @endif

    @foreach($film->comments as $comment)
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Opinión por {{ $comment->user->name }}
                    </div>
                    <div class="panel-body">
                        <p>{{ $comment->text }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if(Auth::check())
        <div class="row">
            <div class="col-xs-12">
                <form action="{{ url('/comment') }}" method="post" accept-charset="utf-8">
                    <input type="hidden" name="film_id" value="{{ $film->id }}">
                    {{ csrf_field() }}
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
    @else
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="alert alert-warning">
                    <a href="{{ url('auth/login') }}" title="Iniciar sesión"><strong>Inicia sesión</strong></a> o <a href="{{ url('register') }}" title="Registrarse"><strong>regístrate</strong></a> para dejar un comentario.
                </div>
            </div>
        </div>
    @endif

@endsection

