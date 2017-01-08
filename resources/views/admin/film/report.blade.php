@extends('master')

@section('title')
    Informe de películas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')
	{{ json_encode($films) }}
@endsection
