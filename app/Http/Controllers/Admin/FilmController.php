<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Film;
use App\Projection;
use App\Ticket;
use App\Theater;
use Carbon\Carbon;

class FilmController extends Controller
{
    public function add()
    {
        return view('admin.film.add')
                ->withFilm(new Film)
                ->withActors('')
                ->withGenres(Film::getGenres())
                ->withAgeRatings(Film::getAgeRatings());
    }

    public function manage()
    {
        $films = Film::get();

        return view('admin.film.manage')
                ->withFilms($films)
                ->withGenres(Film::getGenres())
                ->withAgeRatings(Film::getAgeRatings());
    }

    public function edit($id)
    {
        $film = Film::with('actors')->find($id);

        return view('admin.film.edit')
                ->withFilm($film)
                ->withActors(implode(', ', ($film->actors->pluck('name')->toArray())))
                ->withGenres(Film::getGenres())
                ->withAgeRatings(Film::getAgeRatings());
    }

    public function save(Request $request, $id = false)
    {
        Film::updateOrCreateWithActors(['id' => $request->has('id') ? $request->id : $id], $request);
        return redirect("#");
    }

    public function delete($id)
    {
        $film = Film::where('id', $id)->first()->cascadeDelete();
        return redirect('admin/manage_films');
    }

    public function report($group = 'genre')
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
}
