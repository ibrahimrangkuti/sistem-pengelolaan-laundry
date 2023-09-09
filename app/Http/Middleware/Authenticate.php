<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            Alert::error('Akses Gagal', 'Silahkan Login Terlebih Dahulu');
            return route('login.index');
        }
    }
}
