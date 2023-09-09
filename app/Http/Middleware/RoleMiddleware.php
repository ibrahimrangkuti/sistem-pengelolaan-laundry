<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        if (!Auth::check()) {
            Alert::error('Gagal', 'Silakan login terlebih dahulu');
            return redirect()->route('login.index');
        }

        if (!in_array(Auth::user()->role, $role)) {
            Alert::error('Anda tidak memiliki akses!');
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
