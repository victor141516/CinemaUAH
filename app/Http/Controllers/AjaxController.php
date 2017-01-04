<?php

namespace App\Http\Controllers;

use Auth;
use App\Film;
use App\Ticket;
use App\Projection;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function bookSeat(Request $request)
    {
        $projection = Projection::find($request->projection_id);
        if (is_null($projection)) {
        	return -1;
        }

        $ticket = Ticket::updateOrCreate([
        	'projection_id' => $projection->id,
        	'user_id' => Auth::check() ? Auth::id() : null,
        	'row' => $request->row,
        	'column' => $request->column,
        ], ['is_paid' => false,]);

        return $ticket->id;
    }

    public function paySeat(Request $request)
    {
        $projection = Projection::find($request->projection_id);
        if (is_null($projection)) {
        	return -1;
        }

        $ticket = Ticket::updateOrCreate([
        	'projection_id' => $projection->id,
        	'user_id' => Auth::check() ? Auth::id() : null,
        	'row' => $request->row,
        	'column' => $request->column,
        ], ['is_paid' => false,]);

        return $ticket->id;
    }
}
