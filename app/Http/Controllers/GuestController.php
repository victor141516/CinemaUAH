<?php

namespace App\Http\Controllers;
use Auth;
use App\Film;

class GuestController extends Controller
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

    public function showFilms()
    {
        dd(Auth::user());
        $films = Film::paginate(10);

        return view('public.films')
                ->withFilms($films);
    }

    public function showFilmDetailed($id)
    {
        $film = Film::where('id', $id)->with('comments')->first();

        return view('public.film_detailed')
                ->withFilm($film);
    }
}
