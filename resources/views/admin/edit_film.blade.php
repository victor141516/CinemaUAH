@extends('master')

@section('title')
    Editar pelicula
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
            <div class="col-md-4 col-xs-12 col-md-offset-3">
                <div class="form-group">
                    <label for="title" class="control-label">Título</label>
                    <input class="form-control" type="text" id="title" name="name" value={{ $film->name }}>
                </div>
                <div class="form-group">
                    <label for="Director" class="control-label">Director</label>
                    <input class="form-control" type="text" id="Director" name="director" value={{ $film->director }}>
                </div>
                <div class="form-group">
                    <label for="genre" class="control-label">Género</label>
                    <select class="form-control" id="genre" name="genre">
                        @foreach($genres as $each)
                            <option @if($each==$film->genre) selected="selected" @endif>{{ $each }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Duración" class="control-label">Duración</label>
                    <input class="form-control" type="number" id="Duración" name="minutes_duration" value={{ $film->minutes_duration }}>
                </div>
                <div class="form-group">
                    <label for="website" class="control-label">Página Oficial</label>
                    <input class="form-control" type="text" id="website" name="website" value={{ $film->website }}>
                </div>
                <div class="form-group">
                    <label for="date" class="control-label">Fecha de estreno</label>
                    <input class="form-control" type="number" id="date" name="year" value={{ $film->year }}>
                </div>
                <div class="form-group">
                    <label for="synopsis" class="control-label">Sinopsis</label>
                    <textarea class="form-control" rows="3" id="synopsis" name="synopsis">{{ $film->synopsis }}</textarea>
                </div>

                <div class="form-group">
                    <label for="Clasificación" class="control-label">Clasificación</label>
                    <select class="form-control" id="Clasificación" name="age_rating">
                        @foreach($age_ratings as $each)
                            <option @if($each==$film->age_rating) selected="selected" @endif>{{ $each }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <img src=@if($film->has_image) "/img/{{ $film->id }}.jpg" @else "/img/default.jpg" @endif alt="">
            </div>
        </div>
    </form>

@endsection
