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
        $genres = Film::groupBy('genre')->get()->pluck('genre');
        $age_ratings = Film::groupBy('age_rating')->get()->pluck('age_rating');

        return view('admin.add_film')
                ->withGenres($genres)
                ->withAgeRatings($age_ratings);
    }

    public function saveFilm(Request $request, $id = false)
    {
        Film::updateOrCreate(['id' => $id], $request->all());
        $genres = Film::groupBy('genre')->get()->pluck('genre');
        $age_ratings = Film::groupBy('age_rating')->get()->pluck('age_rating');

        return redirect("#");
    }

    public function editFilm($id)
    {
        $film = Film::find($id);
        $genres = Film::groupBy('genre')->get()->pluck('genre');
        $age_ratings = Film::groupBy('age_rating')->get()->pluck('age_rating');

        return view('admin.edit_film')
                ->withFilm($film)
                ->withGenres($genres)
                ->withAgeRatings($age_ratings);
    }

    public function manageFilms()
    {
        $films = Film::paginate(10);
        $genres = Film::groupBy('genre')->get()->pluck('genre');
        $age_ratings = Film::groupBy('age_rating')->get()->pluck('age_rating');

        return view('admin.manage_films')
                ->withFilms($films)
                ->withGenres($genres)
                ->withAgeRatings($age_ratings);
    }

    public function addTheater()
    {
        return view('admin.add_theater');
    }

    public function editTheater($id)
    {
        $theater = Theater::find($id);
        
        return view('admin.edit_theater')
                ->withTheater($theater);
    }

    public function manageTheaters()
    {
        $theaters = Theater::paginate(10);

        return view('admin.manage_theaters')
                ->withTheaters($theaters);
    }

    public function saveTheater(Request $request, $id = false)
    {
        Theater::updateOrCreate(['id' => $id], $request->all());
        
        return redirect("#");
    }

    public function manageTheatersSelectTheater()
    {
        $theaters = Theater::paginate(10);

        return view('admin.manage_tickets_theaters')
                ->withTheaters($theaters);
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
