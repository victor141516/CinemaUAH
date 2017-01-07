<?php

namespace App\Http\Controllers;

use Auth;
use App\Comment;
use App\Film;
use App\Projection;
use App\Ticket;
use Carbon\Carbon;
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

	public function paySeat(Request $request, $token = false)
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

	public function adminChangeSeat(Request $request)
	{
		if ($request->user()->role != 'admin') {
			return abort(403);
		}
		$ticket = Ticket::where([
			'projection_id' => $request->projection,
			'row' => $request->row,
			'column' => $request->column,
		])->first();
		if (is_null($ticket)) {
			$ticket = Ticket::create([
				'projection_id' => $request->projection,
				'row' => $request->row,
				'column' => $request->column,
				'deleted_at' => NULL,
				'admin_lock' => true
			]);
		} else {
			$update = [
				'deleted_at' => $request->state == 'free' ? Carbon::now() : NULL,
			];
			if ($request->state == 'free') {
				$update['admin_lock'] = false;
			}
			$ticket->update($update);
		}
		return is_null($ticket->deleted_at) ? 0 : 1;
	}

	public function deleteProjection(Request $request, $projection_id)
	{
		if ($request->user()->role != 'admin') {
			return abort(403);
		}
		$projection = Projection::find($projection_id);
		$projection->tickets()->delete();
		$projection->delete();
		return 0;
	}
}
