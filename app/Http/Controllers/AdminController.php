<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Application;

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
        return view('admin.add_film');
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
