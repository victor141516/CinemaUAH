{{-- Form --}}

@extends('master')

@section('title')
    Añadir / Editar pelicula
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
            <div class="col-md-4 col-xs-12 col-md-offset-3">
                <div class="form-group">
                    <label for="title" class="control-label">Título</label>
                    <input class="form-control" type="text" id="title">
                </div>
                <div class="form-group">
                    <label for="Director" class="control-label">Director</label>
                    <input class="form-control" type="text" id="Director">
                </div>
                <div class="form-group">
                    <label for="genre" class="control-label">Género</label>
                    <select class="form-control" id="genre">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Duración" class="control-label">Duración</label>
                    <input class="form-control" type="number" id="Duración">
                </div>
                <div class="form-group">
                    <label for="website" class="control-label">Página Oficial</label>
                    <input class="form-control" type="text" id="website">
                </div>
                <div class="form-group">
                    <label for="date" class="control-label">Fecha de estreno</label>
                    <input class="form-control" type="number" id="date">
                </div>
                <div class="form-group">
                    <label for="synopsis" class="control-label">Sinopsis</label>
                    <textarea class="form-control" rows="3" id="synopsis"></textarea>
                </div>

                <div class="form-group">
                    <label for="Clasificación" class="control-label">Clasificación</label>
                    <select class="form-control" id="Clasificación">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                caratula con dragDrop
            </div>
        </div>
    </form>

@endsection
