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

    @include('common.film_list')

@endsection

