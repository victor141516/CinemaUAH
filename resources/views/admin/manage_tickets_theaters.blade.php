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
        @foreach($theaters as $theater)
            <div class="col-md-3 col-sm-6 col-xs-12 text-center theater">
                <a href="{{ url('admin/manage_tickets/' . $theater->id . '/select_projection/') }}">
                    <h4>{{ $theater->name }}</h4>
                </a>
            </div>
        @endforeach
    </div>

@endsection

