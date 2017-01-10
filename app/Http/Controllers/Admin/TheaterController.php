<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Film;
use App\Projection;
use App\Ticket;
use App\Theater;
use Carbon\Carbon;

class TheaterController extends Controller
{
    public function add()
    {
        return view('admin.theater.add');
    }

    public function manage()
    {
        $theaters = Theater::get();
        return view('admin.theater.manage')->withTheaters($theaters);
    }

    public function edit($id)
    {
        $theater = Theater::find($id);
        return view('admin.theater.edit')->withTheater($theater);
    }

    public function save(Request $request, $id = false)
    {
        Theater::updateOrCreate(['id' => $id], $request->all());
        return redirect("#");
    }

    public function delete($id)
    {
        Theater::delete($id);

        return redirect('admin/manage_theaters');
    }

    public function report()
    {
        $first_projection = Projection::orderBy('begin', 'ASC')->first();
        $theaters = Theater::with('projections')->get();

        return view('admin.theater.report')
            ->withTheaters($theaters);
    }
}
