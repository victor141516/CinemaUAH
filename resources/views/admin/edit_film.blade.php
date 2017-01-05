@extends('master')

@section('title')
    Editar ({{ $film->name }})
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <form action="" method="post" accept-charset="utf-8">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a href="{{ url('admin/delete_film/'. $film->id) }}" class="btn btn-danger">Borrar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="name" class="control-label">Título</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ $film->name }}">
                </div>
                <div class="form-group">
                    <label for="synopsis" class="control-label">Sinopsis</label>
                    <textarea class="form-control" rows="4" id="synopsis" name="synopsis">{{ $film->synopsis }}</textarea>
                </div>
                <div class="form-group">
                    <label for="website" class="control-label">Página Oficial</label>
                    <input class="form-control" type="text" id="website" name="website" value="{{ $film->website }}">
                </div>
                <div class="form-group">
                    <label for="original_title" class="control-label">Título original</label>
                    <input class="form-control" type="text" id="original_title" name="original_title" value="{{ $film->original_title }}">
                </div>
                <div class="form-group">
                    <label for="genre" class="control-label">Género</label>
                    <select class="form-control" id="genre" name="genre">
                        @foreach($genres as $each)
                            <option value="{{ $each }}" @if($film->genre == $each) selected="selected" @endif>{{ $each }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="country" class="control-label">Nacionalidad</label>
                    <input class="form-control" type="text" id="country" name="country" value="{{ $film->country }}">
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="minutes_duration" class="control-label">Duración</label>
                    <input class="form-control" type="number" id="minutes_duration" name="minutes_duration" value="{{ $film->minutes_duration }}">
                </div>
                <div class="form-group">
                    <label for="year" class="control-label">Año</label>
                    <input class="form-control" type="number" id="year" name="year" value="{{ $film->year }}">
                </div>
                <div class="form-group">
                    <label for="producer" class="control-label">Distribuidora</label>
                    <input class="form-control" type="text" id="producer" name="producer" value="{{ $film->producer }}">
                </div>
                <div class="form-group">
                    <label for="Director" class="control-label">Director</label>
                    <input class="form-control" type="text" id="Director" name="director" value="{{ $film->director }}">
                </div>
                <div class="form-group">
                    <label for="actors" class="control-label">Actores</label>
                    <input class="form-control" type="text" id="actors" name="actors" value="{{ $actors }}">
                </div>
                <div class="form-group">
                    <label for="age_rating" class="control-label">Clasificación</label>
                    <select class="form-control" id="age_rating" name="age_rating">
                        @foreach($age_ratings as $age_rating)
                            <option value="{{ $age_rating }}" @if($film->age_rating == $age_rating) selected @endif>{{ $age_rating }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="others" class="control-label">Datos</label>
                    <input class="form-control" type="text" id="others" name="others" value="{{ $film->others }}">
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <img src=@if($film->has_image) "/img/{{ $film->id }}.jpg" @else "/img/default.jpg" @endif alt="">
            </div>
        </div>
    </form>

@endsection
