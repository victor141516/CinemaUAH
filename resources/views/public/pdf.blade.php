<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-9">
            {{ config('app.name', 'Laravel') }}
        </div>
        <div class="col-xs-3">
            <img src="data:image/png;base64,{{ $qr }}" alt="barcode"/>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <strong>{{ $tickets[0]->projection->theater->name }}</strong>
        </div>
        <div class="col-xs-3 col-xs-offset-6">
            <strong>Fecha: </strong> {{ $tickets[0]->projection->begin }}
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sitio</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td><strong>Fila:</strong> {{ $ticket->row }}; <strong>Columna:</strong> {{ $ticket->columna }}</td>
                            <td>5€</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
