@extends('master')

@section('title')
    Informe de salas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')
	{{ json_encode($theaters) }}
@endsection
