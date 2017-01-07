@extends('master')

@section('extra-css')
    <style type="text/css" media="screen">
        .fila {
            display: flex;
            min-height: 24px;
        }
        .columna {
            flex-basis: 100%;
            background-position: center;
        }
        .free {
            background-image: url('{{ url('/img/free_seat.png') }}');
            background-repeat: no-repeat;
        }
        .taken {
            background-image: url('{{ url('/img/taken_seat.png') }}');
            background-repeat: no-repeat;
        }
    </style>
@endsection

@section('title')
    Películas
@endsection

@section('navbar')
    @include('admin.common.navigation')
@endsection

@section('content')

        <div class="row">
            <div class="col-xs-12" id="theater">
                <div class="row text-center" style="background-color: grey;">
                    <strong>Pantalla</strong>
                </div>
                @for ($i = 0; $i <= $projection->theater->n_rows; $i++)
                    <div class="row fila" id="fila{{ $i }}">
                        @for ($j = 0; $j <= $projection->theater->n_columns; $j++)
                            <div class="columna text-center @if(in_array($i . '-' . $j, $seats)) taken @else free @endif {{ 'seat-' . $i . '-' . $j }}" id="columna{{ $j }}"></div>
                        @endfor
                    </div>
                @endfor
            </div>
        </div>

@endsection

@section('extra-js')
    <script type="text/javascript">
        $("[id^=columna]").click(function(){
            var seat_selector = $(this);
            if(seat_selector.hasClass('free')) {
                state = 'taken';
            } else {
                state = 'free';
            }
            seat = seat_selector.attr('class').toString().split('seat-')[1].split(' ')[0].split('-');
            $.ajax({
                type: 'post',
                url: '/api/change_seat',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    projection: {{ $projection->id }},
                    row: seat[0],
                    column: seat[1],
                    state: state
                },
                success: function(data, textStatus, xhr) {
                    if(data == 0) {
                        seat_selector.addClass('taken');
                        seat_selector.removeClass('free')
                    } else if (data == 1) {
                        seat_selector.addClass('free');
                        seat_selector.removeClass('taken')
                    }
                }
            });
        });
    </script>
@endsection
