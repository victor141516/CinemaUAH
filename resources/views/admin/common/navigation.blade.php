<nav class="navbar navbar-default navbar-fixed-top">
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
                <li @if (Request::is('/admin/home')) class="active" @endif>
                    <a href="{{ url('/admin/home') }}">Home</a>
                </li>
                <li role="presentation" @if (Request::is('admin/add_film') || Request::is('admin/manage_films')) class="active" @endif>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                        Peliculas <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation" @if (Request::is('admin/add_film')) class="active" @endif>
                            <a href="{{ url('admin/add_film') }}">Añadir pelicula</a>
                        </li>
                        <li role="presentation" @if (Request::is('admin/manage_films')) class="active" @endif>
                            <a href="{{ url('admin/manage_films') }}">Administrar peliculas</a>
                        </li>
                    </ul>
                </li>
                <li role="presentation" @if (Request::is('admin/add_theater') || Request::is('admin/manage_theaters')) class="active" @endif>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                        Salas <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation" @if (Request::is('admin/add_theater')) class="active" @endif>
                            <a href="{{ url('admin/add_theater') }}">Añadir sala</a>
                        </li>
                        <li role="presentation" @if (Request::is('admin/manage_theaters')) class="active" @endif>
                            <a href="{{ url('admin/manage_theaters') }}">Administrar salas</a>
                        </li>
                    </ul>
                </li>
                <li role="presentation" @if (Request::is('admin/manage_tickets')) class="active" @endif>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                        Reservas <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation" @if (Request::is('admin/manage_tickets/select_projection')) class="active" @endif>
                            <a href="{{ url('admin/manage_tickets/select_projection') }}">Administrar reservas</a>
                        </li>
                    </ul>
                </li>
                <li role="presentation" @if (Request::is('admin/films_report') || Request::is('admin/theater_report') || Request::is('admin/entries_report') || Request::is('admin/reservations_report')) class="active" @endif>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                        Informes <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation" @if (Request::is('admin/films_report/genre')) class="active" @endif>
                            <a href="{{ url('admin/films_report') }}">Informe de películas</a>
                        </li>
                        <li role="presentation" @if (Request::is('admin/theater_report')) class="active" @endif>
                            <a href="{{ url('admin/theater_report') }}">Informe de salas</a>
                        </li>
                        <li role="presentation" @if (Request::is('admin/tickets_report/projection_id')) class="active" @endif>
                            <a href="{{ url('admin/tickets_report') }}">Informe de entradas</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
                    <li><a href="{{ url('/register') }}">Registrar</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
