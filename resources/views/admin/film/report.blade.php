@extends('master')

@section('title')
    Informe de películas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')
    <select name="order_by" id="order_by">
        @foreach ($ordenations as $each)
            <option value="{{ $each }}">{{ $each }}</option>
        @endforeach
    </select>
@endsection
