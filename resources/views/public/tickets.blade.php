@extends('master')

@section('title')
    Tickets
@endsection

@section('navbar')
    @include('public.common.navigation')
@endsection

@section('content')

    @if($tickets->count() == 0)
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="alert alert-warning">
                    <strong>¡Atención!</strong> Aún no ha comprado ninguna entrada.
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
            <ul class="list-group">
                @foreach($tickets as $key => $ticket)
                    <li class="list-group-item clearfix">
                        <strong style="line-height: 34px;">{{ $ticket[0]->projection->film->name }}</strong> ({{ $ticket[0]->projection->begin }})
                        <span class="pull-right button-group">
                            <a href="{{ url('tickets/'. $key) }}" class="btn btn-info">
                                Imprimir Tickets
                            </a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


@endsection

