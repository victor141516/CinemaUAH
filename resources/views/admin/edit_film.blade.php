@extends('master')

@section('title')
    Editar ({{ $film->name }})
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <form action="{{ url('/admin/edit_film/'. $film->id) }}" method="post" accept-charset="utf-8">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a href="{{ url('admin/delete_film/'. $film->id) }}" class="btn btn-danger confirmation">Borrar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        @include('admin.common.addOrEdit_film')

    </form>

@endsection

@section('extra-js')
    <script src="/js/image-upload.js" type="text/javascript" charset="utf-8" async defer></script>
    <script type="text/javascript">
        $('.confirmation').on('click', function () {
            return confirm('Vas a borrar esta película, ¿estás seguro?');
        });
    </script>
@endsection
