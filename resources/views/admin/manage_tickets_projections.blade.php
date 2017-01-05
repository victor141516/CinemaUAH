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
    Projecctiones
@endsection

@section('navbar')
    @include('public.common.navigation')
@endsection

@section('content')

    <div class="row">
        @foreach($projections as $projection)
            <div class="col-md-3 col-sm-4 col-xs-12 text-center film">
                <a href="{{ url('admin/manage_tickets/' . $projection->id . '/select_seats') }}">
                    <img src=@if($projection->film->has_image) "/img/{{ $projection->film->id }}.jpg" @else "/img/default.jpg" @endif alt="">
                    <h4>{{ $projection->film->name }} ({{ $projection->begin }})</h4>
                </a>
            </div>
        @endforeach
    </div>

@endsection

