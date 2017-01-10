@extends('master')

@section('title')
    Informe de películas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')
<<<<<<< HEAD

    @foreach($order as $films)
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <h4>Ordenado por {{ end($request->all()) }}</h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <td>Entradas vendidas</td>
                            <td>Ingresos generados</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($films as $film)
                                <td>{{ $film->id }}</td>
                                <td>{{ $film->name }}</td>
                                <td>{{ $film->ticketsCount() }}</td>
                                <td>{{ $film->ticketsCount() * 5 }}€</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

=======
    <select name="order_by" id="order_by">
        @foreach ($ordenations as $each)
            <option value="{{ $each }}">{{ $each }}</option>
        @endforeach
    </select>
>>>>>>> 2179ce070fcadf4adb6fc601f5bcbd38ab47d472
@endsection
