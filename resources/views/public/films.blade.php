@extends('master')

@section('extra-css')
    <style type="text/css" media="screen">
        a {
            color: #424242;
        }
        .film {
            min-height: 340px;
        }
    </style>
@endsection

@section('title')
    Películas
@endsection

@section('navbar')
    @include('public.common.navigation')
@endsection

@section('content')

    <div class="row">
        @foreach($films as $film)
            <div class="col-md-3 col-sm-4 col-xs-12 text-center film">
                <a href="{{ url('film/'.$film->id) }}">
                    <img src=@if($film->has_image) "/img/{{ $film->id }}.jpg" @else "/img/default.jpg" @endif alt="">
                    <h4>{{ $film->name }}</h4>
                </a>
            </div>
        @endforeach
    </div>

@endsection

