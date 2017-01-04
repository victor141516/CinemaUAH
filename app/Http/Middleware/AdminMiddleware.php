<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && $request->user()->role != 'admin') {
            return redirect('/');
        }
        return redirect('/admin/home');
    }

}
