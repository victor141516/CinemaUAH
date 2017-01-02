@extends('master')

@section('title')
    Películas
@endsection

@section('navbar')
    @include('public.common.navigation')
@endsection

@section('content')

    <div class="jumbotron">
        <div class="row">
            @foreach($films as $film)
                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                    <img src=@if($film->has_image) "/img/{{ $film->id }}.jpg" @else "/img/default.jpg" @endif alt="">
                    <h4>{{ $film->name }}</h4>
                </div>
            @endforeach
        </div>
    </div>
@endsection

