@extends('master')

@section('extra-css')
    <style type="text/css" media="screen">
        a {
            color: #424242;
        }
        .projection {
            min-height: 100px;
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
        @foreach($projections as $projection)
            <div class="col-md-3 col-sm-4 col-xs-12 text-center projection">
                <a href="{{ url('admin/manage_tickets/' . $projection->id . '/select_seats') }}">
                    <p>{{ $projection->begin }}</p>
                    <p>{{ $projection->theater->name }}</p>
                </a>
                <a href="{{ url('admin/delete_projection/' . $projection->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div>
        @endforeach
    </div>

@endsection

