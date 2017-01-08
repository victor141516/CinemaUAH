@extends('master')

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
            @if(Request::is('/'))
                <a href="{{ url('film/'.$film->id) }}">
            @else
                <a href="{{ url('admin/edit_film/'.$film->id) }}">
            @endif
                    <img src=@if($film->has_image) "/img/films/{{ $film->id }}.jpg" @else "/img/default.jpg" @endif alt="">
                    <h4>{{ $film->name }}</h4>
                </a>
                @include('public.common.film_projections')
            </div>
        @endforeach
    </div>


@endsection

