@extends('master')

@section('title')
    Crear pelicula
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-warning hidden"></div>
        </div>
    </div>

    <form action="{{ url('/admin/add_film') }}" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
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
        $("#name").bind('input', function() {
            if (!($(this).hasClass('done'))) {
                $(this).addClass('done');
                $.ajax({
                    url: 'placeholder_film',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {'name': $(this).val()},
                })
                .done(function(film_id) {
                    $("#id").val(film_id);
                    $(".image-place").removeClass('hidden');
                });    
            }
        });
    </script>
@endsection
