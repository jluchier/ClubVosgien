<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ValidateAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
        {
            if (Auth::user()->IsValidate())
            {
                return $next($request);
            }
            else
            {
                return redirect(route("home"))->with(["info" => "Vous n'êtes pas validé"]);
            }
        }

        return redirect(route("login"));
    }
}
