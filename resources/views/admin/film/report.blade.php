@extends('master')

@section('title')
    Informe de películas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-sm-offset-4 text-center">
            <select class="form-control" name="order_by" id="order_by">
                @foreach ($ordenations as $each)
                    <option @if($group==$each) selected @endif value="{{ $each }}">{{ $each }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @foreach($film_group as $key => $films)
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <h4><strong>{{ ucfirst($group) }}: {{ $key }}</strong></h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-xs-1">#</th>
                            <th class="col-xs-5">Nombre</th>
                            <th class="col-xs-3">Entradas vendidas</th>
                            <th class="col-xs-3">Ingresos generados</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($films as $film)
                            <tr>
                                <td>{{ $film->id }}</td>
                                <td>{{ $film->name }}</td>
                                <td>{{ $film->ticketsCount() }}</td>
                                <td>{{ $film->ticketsCount() * 5 }}€</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

@endsection

@section('extra-js')
    <script type="text/javascript">
        $("#order_by").change(function() {
            window.location = '/admin/films_report/' + $("#order_by option:selected").val();
        });
    </script>
@endsection
