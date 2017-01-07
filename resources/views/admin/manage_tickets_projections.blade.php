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
    Proyecciones
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
            <ul class="list-group">
                @foreach($projections as $projection)
                <a class="list-group-item" href="{{ url('admin/manage_tickets/' . $projection->id . '/select_seats') }}">
                    <strong>{{ $projection->film->name }}</strong> ({{ $projection->begin }})
                </a>
                @endforeach
            </ul>
        </div>
    </div>

@endsection

