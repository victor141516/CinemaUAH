<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function home()
    {
        return redirect('/admin/manage_films');
        //return view('admin.home');
    }
}
