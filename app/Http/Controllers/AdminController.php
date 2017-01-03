<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Application;
use Illuminate\Http\Request;
use App\Film;
use App\Projection;
use App\Ticket;
use App\Theater;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function addFilm()
    {
        return view('admin.add_film')
                ->withGenres(Film::getGenres())
                ->withAgeRatings(Film::getAgeRatings());
    }

    public function saveFilm(Request $request, $id = false)
    {
        Film::updateOrCreate(['id' => $id], $request->all());
        return redirect("#");
    }

    public function deleteFilm($id)
    {
        Film::delete($id);

        return redirect('admin/manage_films');
    }

    public function editFilm($id)
    {
        $film = Film::find($id);

        return view('admin.edit_film')
                ->withFilm($film)
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

    public function manageTheatersSelectTheater()
    {
        $theaters = Theater::paginate(10);
        return view('admin.manage_tickets_theaters')->withTheaters($theaters);
    }

    public function manageTheatersSelectProjection($theater_id = false)
    {
        if (!$theater_id) {
            return error(403);
        }
        $projections = Theater::find($theater_id)->projections()->with('film')->get();

        return view('admin.manage_tickets_projections')
                ->withProjections($projections);
    }

    public function manageTheatersSelectSeats($projection_id = false)
    {
        if (!$projection_id) {
            return error(403);
        }
        $seats = Ticket::bookedSeats($projection_id)->get();

        return view('admin.manage_tickets_projections')
                ->withSeats($seats);
    }
}
