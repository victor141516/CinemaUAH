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
            <h1>{{ config('app.name', 'Laravel') }}</h1>
        </div>
        <div class="col-xs-3">
            <img src="data:image/png;base64,{{ $qr }}" alt="barcode"/>
        </div>
    </div>
    <div class="row" style="padding-top: 15px">
        <div class="col-xs-12">
            {{ $tickets[0]->projection->film->name }}
        </div>
    </div>
    <div class="row" style="padding-top: 15px">
        <div class="col-xs-3 col-xs-offset-1">
            <strong>{{ $tickets[0]->projection->theater->name }}</strong>
        </div>
        <div class="col-xs-5 col-xs-offset-3">
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
                            <td><strong>Fila:</strong> {{ $ticket->row }}  <strong>Columna:</strong> {{ $ticket->column }}</td>
                            <td>5&euro;</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
