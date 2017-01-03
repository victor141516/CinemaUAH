@extends('master')

@section('extra-css')
    <style type="text/css" media="screen">
        .film {
            min-height: 340px;
        }
    </style>
@endsection

@section('title')
    Películas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <div class="jumbotron">
        <div class="row">
            @foreach($projections as $projection)
                <div class="col-md-3 col-sm-6 col-xs-12 text-center film">
                    <a href="{{ url('manage_tickets/'. $projection->film->id . '/select_seats') }}">
                        <img src=@if($projection->film->has_image) "/img/{{ $projection->film->id }}.jpg" @else "/img/default.jpg" @endif alt="">
                        <h4>{{ $projection->film->name }} ({{ $projection->begin }})</h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

