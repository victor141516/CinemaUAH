@extends('master')

@section('title')
    Crear pelicula
@endsection

@section('extra-css')
<style>
    #holder { border: 10px dashed #ccc; width: 300px; min-height: 400px; margin: 20px auto;}
    #holder.hover { border: 10px dashed #0c0; }
    #holder img { display: block; margin: 10px auto; }
    #holder p { margin: 10px; font-size: 14px; }
    .fail { background: #c00; padding: 2px; color: #fff; }
    .hidden { display: none !important;}
</style>
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-warning hidden"></div>
        </div>
    </div>

    <form action="add_film" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="name" class="control-label">Título</label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="synopsis" class="control-label">Sinopsis</label>
                    <textarea class="form-control" rows="4" id="synopsis" name="synopsis"></textarea>
                </div>
                <div class="form-group">
                    <label for="website" class="control-label">Página Oficial</label>
                    <input class="form-control" type="text" id="website" name="website">
                </div>
                <div class="form-group">
                    <label for="original_title" class="control-label">Título original</label>
                    <input class="form-control" type="text" id="original_title" name="original_title">
                </div>
                <div class="form-group">
                    <label for="genre" class="control-label">Género</label>
                    <select class="form-control" id="genre" name="genre">
                        @foreach($genres as $each)
                            <option>{{ $each }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nationality" class="control-label">Nacionalidad</label>
                    <input class="form-control" type="text" id="nationality" name="nationality">
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="minutes_duration" class="control-label">Duración</label>
                    <input class="form-control" type="number" id="minutes_duration" name="minutes_duration">
                </div>
                <div class="form-group">
                    <label for="year" class="control-label">Año</label>
                    <input class="form-control" type="number" id="year" name="year">
                </div>
                <div class="form-group">
                    <label for="distributor" class="control-label">Distribuidora</label>
                    <input class="form-control" type="text" id="distributor" name="distributor">
                </div>
                <div class="form-group">
                    <label for="Director" class="control-label">Director</label>
                    <input class="form-control" type="text" id="Director" name="director">
                </div>
                <div class="form-group">
                    <label for="actors" class="control-label">Actores</label>
                    <input class="form-control" type="text" id="actors" name="actors">
                </div>
                <div class="form-group">
                    <label for="Clasificación" class="control-label">Clasificación</label>
                    <select class="form-control" id="Clasificación" name="age_rating">
                        @foreach($age_ratings as $each)
                            <option>{{ $each }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="additional_data" class="control-label">Datos</label>
                    <input class="form-control" type="text" id="additional_data" name="additional_data">
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div id="holder"></div>
                <p id="upload" class="hidden">
                    <label>Drag &amp; drop not supported, but you can still upload via this input field:<br>
                        <input type="file">
                    </label>
                </p>
                <p id="filereader">File API &amp; FileReader API not supported</p>
                <p id="formdata">XHR2's FormData is not supported</p>
            </div>
        </div>
    </form>

@endsection

@section('extra-js')
<script src="/js/image-upload.js" type="text/javascript" charset="utf-8" async defer></script>
@endsection
