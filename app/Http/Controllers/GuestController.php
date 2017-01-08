<?php

namespace App\Http\Controllers;

use Auth;
use App\Film;
use App\Projection;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function showFilms()
    {
        $films = Film::with([
            'projections' => function($q) {
                $q->where('begin', '>', Carbon::today());
            }])->get();

        return view('public.films')
                ->withFilms($films);
    }

    public function showFilmDetailed($id)
    {
        $film = Film::where('id', $id)->with('comments')->first();

        return view('public.film_detailed')
                ->withFilm($film);
    }

    public function showSeatBooking($projection_id)
    {
        $projection = Projection::with('tickets')->with('theater')->find($projection_id);
        $seats = $projection->getFormatedSeats();

        return view('public.seat_booking')
            ->withSeats($seats)
            ->withProjection($projection);
    }

    public function bookSeat(Request $request)
    {
        $projection = Projection::find($request->projection_id);
        if (is_null($projection)) {
            return -1;
        }

        $seat_array = explode(',', $request->booking_seats);

        $user_id = Auth::check() ? Auth::id() : null;
        $projection_id = $projection->id;
        $token = uniqid("", true);

        $seat_array = array_map(function($a) use ($projection_id, $user_id, $token) {
            $b = explode('-', $a);
            return [
                'projection_id' => $projection_id,
                'user_id' => $user_id,
                'row' => (int) $b[0],
                'column' => (int) $b[1],
                'token' => $token,
            ];
        }, $seat_array);

        $ticket = [];
        foreach ($seat_array as $each) {
            $ticket[] = Ticket::create($each);
        }

        $request->session()->flash('ticket_token', $token);
        return redirect('/pay');
    }

    public function paySeat(Request $request)
    {
        //Pay logic
        Ticket::whereToken($request->session()->get('ticket_token'))->update(['is_paid' => true]);
        return redirect('/');
    }
}
