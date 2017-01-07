@extends('master')

@section('extra-css')
    <style type="text/css" media="screen">
        .film {
            min-height: 340px;
        }
    </style>
@endsection

@section('title')
    Salas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 col-xs-12">
            <ul class="list-group">
                @foreach($theaters as $theater)
                    <a class="list-group-item" href="{{ url('admin/manage_tickets/' . $theater->id . '/select_projection/') }}" title="Editar sala">{{ $theater->name }}</a>
                @endforeach
            </ul>
        </div>
    </div>

@endsection

