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
    @include('messages.error')
    @include('messages.warning')
    @include('messages.success')

    @include('common.film_list')

@endsection

