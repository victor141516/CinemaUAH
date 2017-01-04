<?php

namespace App\Http\Controllers;

use App\Film;
use App\Projection;
use Auth;

class AjaxController extends Controller
{
    public function bookSeat(Request $request)
    {
        $projection = Projection::find($request->projection_id);
        $ticket = $projection->tickets()->create([
        	'user_id' => Auth::user()->id,
        	'row' => $request->row,
        	'column' => $request->column,
        	'is_paid' => false,
        ]);

        return $ticket->id;
    }
}
