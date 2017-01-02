<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Cinema UAH</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <!--Rol Admin-->
        <li role="presentation" @if (app('request')->is('admin/add_film') || app('request')->is('admin/manage_films')) class="active" @endif>
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">Peliculas <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li role="presentation" @if (app('request')->is('admin/add_user')) class="active" @endif>
                    <a href="{{ url('admin/add_film') }}">Añadir pelicula</a>
                </li>
                <li role="presentation" @if (app('request')->is('admin/manage_users')) class="active" @endif>
                    <a href="{{ url('admin/manage_films') }}">Administrar peliculas</a>
                </li>
            </ul>
        </li>
        <li role="presentation" @if (app('request')->is('admin/add_theater') || app('request')->is('admin/manage_theaters')) class="active" @endif>
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">Salas <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li role="presentation" @if (app('request')->is('admin/add_theater')) class="active" @endif>
                    <a href="{{ url('admin/add_theater') }}">Añadir sala</a>
                </li>
                <li role="presentation" @if (app('request')->is('admin/manage_theaters')) class="active" @endif>
                    <a href="{{ url('admin/manage_theaters') }}">Administrar salas</a>
                </li>
            </ul>
        </li>
        <li role="presentation" @if (app('request')->is('admin/manage_reservations')) class="active" @endif>
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">Reservas <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li role="presentation" @if (app('request')->is('admin/manage_reservations')) class="active" @endif>
                    <a href="{{ url('admin/manage_reservations') }}">Administrar reservas</a>
                </li>
            </ul>
        </li>
        <li role="presentation" @if (app('request')->is('admin/films_report') || app('request')->is('admin/theater_report') || app('request')->is('admin/entries_report') || app('request')->is('admin/reservations_report')) class="active" @endif>
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">Informes <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li role="presentation" @if (app('request')->is('admin/films_report')) class="active" @endif>
                    <a href="{{ url('admin/films_report') }}">Informe de películas</a>
                </li>
                <li role="presentation" @if (app('request')->is('admin/theater_report')) class="active" @endif>
                    <a href="{{ url('admin/theater_report') }}">Informe de salas</a>
                </li>
                <li role="presentation" @if (app('request')->is('admin/entries_report')) class="active" @endif>
                    <a href="{{ url('admin/entries_report') }}">Informe de entradas</a>
                </li>
                <li role="presentation" @if (app('request')->is('admin/reservations_report')) class="active" @endif>
                    <a href="{{ url('admin/reservations_report') }}">Informe de reservas</a>
                </li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
