@extends('master')

@section('title')
    Películas
@endsection

@section('navbar')
    @include('public.common.navigation')
@endsection

@section('content')

    @include('common.film_list')

@endsection

