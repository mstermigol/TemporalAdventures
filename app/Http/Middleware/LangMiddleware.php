<?php
/*
    Author: Sergio Córdoba
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LangMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::get('locale') != null) {
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale', 'en');
            App::setLocale(Session::get('locale'));
        }

        return $next($request);
    }
}
