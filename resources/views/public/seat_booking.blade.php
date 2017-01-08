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
        .booking {
            background-image: url('{{ url('/img/booking_seat.png') }}');
            background-repeat: no-repeat;
        }
    </style>
@endsection

@section('title')
    Selección de asientos
@endsection

@section('navbar')
    @include('public.common.navigation')
@endsection

@section('content')

        <div class="row">
            <div class="col-xs-12" id="theater">
                <p>
                    <form action="{{ url('/book') }}" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" value="" id="booking_seats" name="booking_seats">
                        <input type="hidden" value="{{ $projection->id }}" id="projection_id" name="projection_id">
                        <button type="submit" class="btn btn-success">Comprar</button>
                    </form>
                </p>
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
                seat_selector.addClass('booking');
                seat_selector.removeClass('free')
            } else if(seat_selector.hasClass('booking')) {
                seat_selector.addClass('free');
                seat_selector.removeClass('booking')
            }
            var seat_array = [];
            $(".booking").each(function(index, seat_selector) {
                seat = $(seat_selector).attr('class').toString().split('seat-')[1].split(' ')[0];
                seat_array.push(seat);
            });
            $("#booking_seats").val(seat_array);
        });
    </script>
@endsection
