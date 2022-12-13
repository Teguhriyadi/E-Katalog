<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = NULL)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->role == "admin") {
                return redirect('/admin/dashboard');
            } else if (Auth::user()->role == "editor") {
                return redirect('/editor/dashboard');
            } else if (Auth::user()->role == "penulis") {
                return redirect('/mahasiswa/dashboard');
            } else if (Auth::user()->role == "customer") {
                return redirect("/dosen/dashboard");
            }
        }

        return $next($request);
    }
}
