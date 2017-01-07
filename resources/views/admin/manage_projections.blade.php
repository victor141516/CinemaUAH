@extends('master')

@section('extra-css')
    <style type="text/css" media="screen">
        a {
            color: #424242;
        }
        .projection {
            margin-bottom: 50px;
        }
    </style>
@endsection

@section('title')
    Proyecciones
@endsection

@section('navbar')
    @include('public.common.navigation')
@endsection

@section('content')
    
    <div class="row">
        <form action="{{ url('/admin/manage_projections/' . $film_id) }}" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="form-group">
                        <label for="name" class="control-label">Fecha y hora</label>
                        <input class="form-control" type="datetime" id="datetime" name="begin">
                    </div>
                    <div class="form-group">
                        <label for="synopsis" class="control-label">Sala</label>
                        <select name="theater_id" id="theater_id">
                            @foreach ($theaters as $theater)
                                <option value="{{ $theater->id }}">{{ $theater->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        @foreach($projections as $projection)
            <div class="col-md-3 col-sm-4 col-xs-12 text-center projection">
                <a href="{{ url('admin/manage_tickets/' . $projection->id . '/select_seats') }}">
                    <p>{{ $projection->begin }}</p>
                    <p>{{ $projection->theater->name }}</p>
                </a>
                <a href="{{ url('admin/delete_projection/' . $projection->id) }}" class="btn btn-danger">Borrar</span></a>
            </div>
        @endforeach
    </div>

@endsection

