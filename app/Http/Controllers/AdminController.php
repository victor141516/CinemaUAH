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
}
