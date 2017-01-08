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
        return redirect('/admin/manage_films');
        //return view('admin.home');
    }

    public function addFilm()
    {
        return view('admin.film.add')
                ->withFilm(new Film)
                ->withActors('')
                ->withGenres(Film::getGenres())
                ->withAgeRatings(Film::getAgeRatings());
    }

    public function saveFilm(Request $request, $id = false)
    {
        Film::updateOrCreateWithActors(['id' => $request->has('id') ? $request->id : $id], $request);
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

        return view('admin.film.edit')
                ->withFilm($film)
                ->withActors(implode(', ', ($film->actors->pluck('name')->toArray())))
                ->withGenres(Film::getGenres())
                ->withAgeRatings(Film::getAgeRatings());
    }

    public function manageFilms()
    {
        $films = Film::get();

        return view('admin.film.manage')
                ->withFilms($films)
                ->withGenres(Film::getGenres())
                ->withAgeRatings(Film::getAgeRatings());
    }

    public function addTheater()
    {
        return view('admin.theater.add');
    }

    public function editTheater($id)
    {
        $theater = Theater::find($id);
        return view('admin.theater.edit')->withTheater($theater);
    }

    public function deleteTheater($id)
    {
        Theater::delete($id);

        return redirect('admin/manage_theaters');
    }

    public function manageTheaters()
    {
        $theaters = Theater::get();
        return view('admin.theater.manage')->withTheaters($theaters);
    }

    public function saveTheater(Request $request, $id = false)
    {
        Theater::updateOrCreate(['id' => $id], $request->all());
        return redirect("#");
    }

    public function manageTheatersSelectProjection()
    {
        $theaters = Projection::with('theater')->with('film')->get()->groupBy('theater_id');

        return view('admin.ticket.manage_projections')
                ->withTheaters($theaters);
    }

    public function manageTheatersSelectSeats($projection_id = false)
    {
        if (!$projection_id) {
            return error(403);
        }
        $projection = Projection::with('tickets')->with('theater')->find($projection_id);
        $seats = $projection->getFormatedSeats();

        return view('admin.ticket.manage_seats')
                ->withSeats($seats)
                ->withProjection($projection);
    }

    public function manageProjections($film_id)
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
        $films = Film::with('actors')
            ->with('comments')
            ->with(['projections' => function($query) {
                $query->with('tickets');
            }])
            ->get()->groupBy($group);

        return view('admin.film.report')
            ->withGroup($group)
            ->withFilms($films);
    }

    public function theaterReport()
    {
        $theaters = Theater::with('projections')->get();

        return view('admin.theater.report')
            ->withTheaters($theaters);
    }

    public function ticketsReport($group = 'projection_id')
    {
        $tickets = Ticket::with('projection')
            ->with('user')
            ->get()->groupBy($group);

        return view('admin.ticket.report')
            ->withTickets($tickets);
    }
}
