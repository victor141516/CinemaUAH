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
        <!--Rol User-->
        <li  @if (app('request')->is('/')) class="active" @endif>
          <a href="{{ url('/') }}">Home</a>
        </li>
        <li  @if (app('request')->is('films')) class="active" @endif>
          <a href="{{ url('/films') }}">Películas</a>
        </li>
        <li  @if (app('request')->is('theater')) class="active" @endif>
          <a href="{{ url('/theater') }}">Salas</a>
        </li>
        <li  @if (app('request')->is('reservations')) class="active" @endif>
          <a href="{{ url('/reservations') }}">Consultar reservas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
