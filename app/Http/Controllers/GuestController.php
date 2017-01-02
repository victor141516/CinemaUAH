<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Application;

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
        return view('public.films');
    }

    public function showFilmDetailed()
    {
        # code...
    }
}
