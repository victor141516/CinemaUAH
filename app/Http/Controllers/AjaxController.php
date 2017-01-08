<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Image;
use App\Comment;
use App\Film;
use App\Projection;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
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

	public function placeholderFilm(Request $request)
	{
		if ($request->user()->role != 'admin') {
			return abort(403);
		}
		$data = $request->all();
		$data['deleted_at'] = Carbon::now();
		$film = Film::create($data);
		return $film->id;
	}

	public function editFilmImage(Request $request)
	{
        if (!($request->hasFile('image') and $request->file('image')->isValid())) {
        	return -1;
        }
        $path = 'img/films/';
		$fFormat = 'jpg';
		$quality = 80;
		$filename = $request->film_id;	

		$imgname = $filename . '.' . $fFormat;
        File::delete($path . $imgname);

        if ($request->file('image')->move($path, $imgname)) {
        	if (Image::make($path . $imgname)->resize(null, 275, function ($constraint) {
                    $constraint->aspectRatio();
                })->save()) {
        		return 1;
        	}
        	return 0;
        }
	}
}
