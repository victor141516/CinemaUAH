<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Application;
use Illuminate\Http\Request;
use App\Film;

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

    public function showFilmDetailed()
    {
        # code...
    }

    public function addTheater()
    {
        return view('admin.add_theater');
    }
}
