<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Film;
use App\Projection;
use App\Ticket;
use App\Theater;
use Carbon\Carbon;

class ProjectionController extends Controller
{
    public function manage($film_id)
    {
        $projections = Projection::with('theater')->where('film_id', $film_id)->get();
        $theaters = Theater::all();
        $films = Film::all();

        return view('admin.projection.manage')
            ->withFilmId($film_id)
            ->withProjections($projections)
            ->withFilms($films)
            ->withTheaters($theaters);
    }

    public function save(Request $request, $film_id)
    {
        $projection = Film::find($film_id)->projections()->create($request->all());

        if ($projection) {
            return back();
        } else {
            return back()->withError('Error al guardar el cambio.');
        }
    }

    public function delete(Request $request, $projection_id)
    {
        $projection = Projection::find($projection_id);
        $projection->tickets()->forceDelete();
        $projection->delete();
        return back();
    }
}
