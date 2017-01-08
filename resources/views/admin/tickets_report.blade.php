@extends('master')

@section('title')
    Informe de entradas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')
	{{ json_encode($tickets) }}
@endsection
