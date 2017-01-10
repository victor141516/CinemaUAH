<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Film;
use App\Projection;
use App\Ticket;
use App\Theater;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function manage()
    {
        $theaters = Projection::with('theater')->with('film')->get()->groupBy('theater_id');

        return view('admin.ticket.manage')
                ->withTheaters($theaters);
    }

    public function seats($projection_id = false)
    {
        if (!$projection_id) {
            return error(403);
        }
        $projection = Projection::with('tickets')->with('theater')->find($projection_id);
        $seats = $projection->getFormatedSeats();

        return view('admin.ticket.seats')
                ->withSeats($seats)
                ->withProjection($projection);
    }

    public function report()
    {
        $tickets = Ticket::groupBy(DB::raw('DATE(created_at)'))->select(DB::raw('count(*) as n_tickets, DATE(created_at) as date'))->get();

        return view('admin.ticket.report')
            ->withTickets($tickets);
    }
}
