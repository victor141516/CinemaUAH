@extends('master')

@section('extra-css')
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-datetimepicker.min.css">
@endsection

@section('title')
    Proyecciones
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <div class="row">
        <form action="{{ url('/admin/manage_projections/' . $film_id) }}" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            <div class="col-sm-4 col-sm-offset-1 col-xs-6">
                <label for="name" class="control-label">Fecha y hora</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <input class="form-control" type="datetime" id="datetime" name="begin">
                </div>
            </div>
            <div class="col-sm-4 col-sm-offset-1 col-xs-6">
                <div class="form-group">
                    <label for="synopsis" class="control-label">Sala</label>
                    <select class="form-control" name="theater_id" id="theater_id">
                        @foreach ($theaters as $theater)
                            <option value="{{ $theater->id }}">{{ $theater->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-12 text-center">
            <ul class="list-group">
                @foreach($projections as $projection)
                    <li class="list-group-item clearfix">
                        <a href="{{ url('admin/manage_tickets/' . $projection->id . '/select_seats') }}">{{ $projection->theater->name }} ({{ $projection->begin }})</a>
                        <span class="pull-right button-group">
                            <a href="{{ url('admin/delete_projection/' . $projection->id) }}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection

@section('extra-js')
    <script src="/js/moment.js" type="text/javascript"></script>
    <script src="/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetime').datetimepicker({
                minDate: moment(),
                maxDate: moment().add(1, 'month'),
                sideBySide: true,
                stepping: 15
            });
        });
    </script>
@endsection
