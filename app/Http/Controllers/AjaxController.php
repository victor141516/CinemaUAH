<?php

namespace App\Http\Controllers;

use Auth;
use App\Comment;
use App\Film;
use App\Projection;
use App\Ticket;
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
		], ['is_paid' => false,
			'token' => uniqid("", true),]);

		return $ticket->token;
	}

	public function paySeat($token = false)
	{
		$ticket = Ticket::where('token', $token)->first();
		if ($ticket) {
			$ticket->update(['is_paid' => true]);
			return $ticket->id;
		}
		return -1;
	}

	public function comment(Request $request)
	{
		Comment::updateOrCreate([
			'user_id' => Auth::id(),
			'film_id' => $request->film_id,
			'text' => $request->comment])->id;
		return back();
	}
}
