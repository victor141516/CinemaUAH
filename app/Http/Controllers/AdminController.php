<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Application;
use Illuminate\Http\Request;
use App\Film;
use App\Theater;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function addFilm()
    {
        $genres = Film::groupBy('genre')->get()->pluck('genre');
        $age_ratings = Film::groupBy('age_rating')->get()->pluck('age_rating');

        return view('admin.add_film')
                ->withGenres($genres)
                ->withAgeRatings($age_ratings);
    }

    public function saveFilm(Request $request)
    {
        Film::insert($request->all());

        return view('admin.add_film')
                ->withSuccess("Película guardada correctamente.");
    }

    public function deleteFilm($id)
    {
        Film::delete($id);

        return redirect('admin/manage_films');
    }

    public function editFilm($id)
    {
        $film = Film::where('id', $id)->first();
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

        return view('admin.manage_films')
                ->withFilms($films);
    }

    public function editTheater($id)
    {
        $theater = Theater::where('id', $id)->first();

        return view('admin.edit_theater')
                ->withTheater($theater);
    }

    public function deleteTheater($id)
    {
        Theater::delete($id);

        return redirect('admin/manage_theaters');
    }

    public function manageTheaters()
    {
        $theaters = Theater::all();

        return view('admin.manage_theaters')
                ->withTheaters($theaters);
    }

    public function addTheater()
    {
        return view('admin.add_theater');
    }
}
