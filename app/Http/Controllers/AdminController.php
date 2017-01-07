<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Projection;
use App\Ticket;
use App\Theater;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function home()
    {
        return redirect('/admin/add_film');
        //return view('admin.home');
    }

    public function addFilm()
    {
        return view('admin.add_film')
                ->withFilm(new Film)
                ->withActors('')
                ->withGenres(Film::getGenres())
                ->withAgeRatings(Film::getAgeRatings());
    }

    public function saveFilm(Request $request, $id = false)
    {
        Film::updateOrCreateWithActors(['id' => $id], $request);
        return redirect("#");
    }

    public function deleteFilm($id)
    {
        // TODO: elimiar relaciones
        Film::where('id', $id)->first();

        return redirect('admin/manage_films');
    }

    public function editFilm($id)
    {
        $film = Film::with('actors')->find($id);

        return view('admin.edit_film')
                ->withFilm($film)
                ->withActors(implode(', ', ($film->actors->pluck('name')->toArray())))
                ->withGenres(Film::getGenres())
                ->withAgeRatings(Film::getAgeRatings());
    }

    public function manageFilms()
    {
        $films = Film::paginate(10);

        return view('admin.manage_films')
                ->withFilms($films)
                ->withGenres(Film::getGenres())
                ->withAgeRatings(Film::getAgeRatings());
    }

    public function addTheater()
    {
        return view('admin.add_theater');
    }

    public function editTheater($id)
    {
        $theater = Theater::find($id);
        return view('admin.edit_theater')->withTheater($theater);
    }

    public function deleteTheater($id)
    {
        Theater::delete($id);

        return redirect('admin/manage_theaters');
    }

    public function manageTheaters()
    {
        $theaters = Theater::paginate(10);
        return view('admin.manage_theaters')->withTheaters($theaters);
    }

    public function saveTheater(Request $request, $id = false)
    {
        Theater::updateOrCreate(['id' => $id], $request->all());
        return redirect("#");
    }

    public function manageTheatersSelectProjection()
    {
        $theaters = Projection::with('theater')->with('film')->get()->groupBy('theater_id');

        return view('admin.manage_tickets_projections')
                ->withTheaters($theaters);
    }

    public function manageTheatersSelectSeats($projection_id = false)
    {
        if (!$projection_id) {
            return error(403);
        }
        $projection = Projection::with('tickets')->with('theater')->find($projection_id);

        $seats = [];
        foreach ($projection->tickets as $each) {
            $seats[$each->id] = $each->row . '-' . $each->column;
        }

        return view('admin.manage_tickets_seats')
                ->withSeats($seats)
                ->withProjection($projection);
    }

    public function manageProjections($film_id)
    {
        $projections = Projection::with('theater')->where('film_id', $film_id)->get();
        $theaters = Theater::all();
        $films = Film::all();

        return view('admin.manage_projections')
            ->withFilmId($film_id)
            ->withProjections($projections)
            ->withFilms($films)
            ->withTheaters($theaters);
    }

    public function saveProjection(Request $request, $film_id)
    {
        $projection = Film::find($film_id)->projections()->create($request->all());

        if ($projection) {
            return back();
        } else {
            return back()->withError('Error al guardar el cambio.');
        }
    }

    public function deleteProjection(Request $request, $projection_id)
    {
        $projection = Projection::find($projection_id);
        $projection->tickets()->forceDelete();
        $projection->delete();
        return back();
    }

    public function filmsReport($group = 'genre')
    {
        $films = Film::with('tickets')
            ->with('actors')
            ->with('comments')
            ->with('projections')
            ->get()->groupBy($group);

        return view('admin.films_report')
            ->withGroup($group)
            ->withFilms($films);
    }

    public function theaterReport()
    {
        $theaters = Theater::with('projections')->get();

        return view('admin.theater_report')
            ->withTheaters($theaters);
    }

    public function ticketReport($group = 'projection_id')
    {
        $tickets = Ticket::with('projections')
            ->with('user')
            ->get()->groupBy($group);

        return view('admin.entries_report');
    }
}
