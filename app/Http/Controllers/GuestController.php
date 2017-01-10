<?php

namespace App\Http\Controllers;

use App\Film;
use App\Projection;
use App\Ticket;
use Auth;
use Carbon\Carbon;
use DNS2D;
use Illuminate\Http\Request;
use PDF;

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
        $film = Film::where('id', $id)->with([
            'projections' => function($q) {
                $q->where('begin', '>', Carbon::today());
            }])->with('comments')->first();

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
            $each_compare = $each;
            unset($each_compare["user_id"]);
            unset($each_compare["token"]);
            if (!(Ticket::where($each_compare)->exists())){
                $ticket[] = Ticket::create($each);
            }
        }

        $request->session()->flash('ticket_token', $token);
        return redirect('/pay');
    }

    public function paySeat(Request $request)
    {
        //Pay logic

        $ticket = Ticket::whereToken($request->session()->get('ticket_token'));
        $projection_id = $ticket->projection_id;
        $ticket->update(['is_paid' => true]);
        return redirect('/tickets/' . $projection_id);
    }

    public function showTickets(Request $request)
    {
        $tickets = $request->user()->tickets()->with(['projection' => function($query) {
            $query->with('film');
        }])->get()->groupBy('projection_id');

        return view('public.tickets')
            ->withTickets($tickets);
    }

    public function printTicket(Request $request, $projection_id)
    {
        $token = uniqid("", true);
        $tickets = $request->user()->tickets()->with(['projection' => function($query) {
            $query->with('film');
            $query->with('theater');
        }])->where('projection_id', $projection_id);
        $tickets->update(['token' => $token]);

        $pdf = PDF::loadView('public.pdf', [
            'tickets' => $tickets->get(),
            'qr' => DNS2D::getBarcodePNG($token, "QRCODE"),
        ]);
        return $pdf->download('Entradas.pdf');
    }
}
